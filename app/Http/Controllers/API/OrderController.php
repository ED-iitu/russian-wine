<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mail\IndexController as SendMail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'items' => 'required|array',
            'total' => 'required|numeric',
        ]);

        $cart_info   = '';
        $requestData = [];
        $type        = 'wine';
        $orders      = [];

        foreach ($validated['items'] as $item) {
            $requestData[] = [
                'product_id' => $item['id'],
                'qty'        => $item['quantity'],
                'type'       => $type,
                'price'      => $item['price']
            ];

            $orders[] = [
                'title'       => $item['title'],
                'model'       => $item['model'],
                'type'        => $type,
                'qty'         => $item['quantity'],
                'price'       => (int)$item['price'],
                'total_price' => (int)$item['price'] * $item['quantity'],
            ];

            $cart_info .= 'Название: <b>' . $item['title'] . '</b> Тип продукта: <b>' . $type . '. </b>Количество: <b>' . $item['quantity'] . '</b> штук <br>  ';
        }

        $cart_info .= 'Общая сумма: <b>' . $validated['total'] . '</b>';

        // Привязываем к пользователю по telegram_chat_id
        $user = null;
        if ($request->filled('telegram_chat_id')) {
            $user = User::where('telegram_chat_id', $request->telegram_chat_id)->first();
        }

        $saveRequest          = new Order();
        $saveRequest->user_id = $user?->id;
        $saveRequest->name    = $validated['name'];
        $saveRequest->phone   = $validated['phone'];
        $saveRequest->email   = $validated['email'];
        $saveRequest->type    = Order::TYPE_CART;
        $saveRequest->message = $cart_info;
        $saveRequest->request = json_encode($requestData);
        $saveRequest->save();

        SendMail::order([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'total'    => $validated['total'],
            'orders'   => $orders,
            'order_id' => $saveRequest->id,
            'phone'    => $validated['phone'],
        ]);

        // Уведомление пользователю в Telegram
        if ($user && $user->telegram_chat_id) {
            $this->notifyUser($user->telegram_chat_id, $orders, $validated['total']);
        }

        return response()->json([
            'message'  => 'Заказ успешно создан',
            'order_id' => $saveRequest->id,
        ], 201);
    }

    private function notifyUser(string $chatId, array $orders, float $total): void
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        if (!$token) return;

        $text = "🎉 Ваш заказ принят! Мы скоро с вами свяжемся 🍷\n\n";

        foreach ($orders as $order) {
            $qty = $order['qty'];
            $qtyWord = $qty == 1 ? 'штука' : ($qty > 1 && $qty < 5 ? 'штуки' : 'штук');
            $text .= "🍇 <b>{$order['title']}</b>\n";
            $text .= "🔸 Тип: <b>{$order['type']}</b>\n";
            $text .= "🔢 Количество: <b>{$qty} {$qtyWord}</b>\n";
            $text .= "💰 Цена: <b>{$order['price']} р.</b>\n\n";
        }

        $text .= "🌟 <b>Итого: {$total} р.</b>\n\n";
        $text .= "Спасибо за ваш заказ! Ожидайте подтверждения 📦";

        $url  = "https://api.telegram.org/bot{$token}/sendMessage";
        $data = http_build_query([
            'chat_id'    => $chatId,
            'text'       => $text,
            'parse_mode' => 'HTML',
        ]);

        $context = stream_context_create(['http' => [
            'method'  => 'POST',
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'content' => $data,
        ]]);

        @file_get_contents($url, false, $context);
    }
}
