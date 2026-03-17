<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mail\IndexController as SendMail;
use App\Models\Order;
use App\User;
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
                'title'      => $item['title'],
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
        $saveRequest->user_id = $user ? $user->id : null;
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

    public function userOrders(Request $request)
    {
        $request->validate(['telegram_chat_id' => 'required']);
        $user = User::where('telegram_chat_id', $request->telegram_chat_id)->first();
        if (!$user) {
            return response()->json(['orders' => []]);
        }
        $orders = $user->orders()
            ->where('type', Order::TYPE_CART)
            ->orderBy('created_at', 'desc')
            ->get(['id', 'created_at', 'message', 'request']);

        $result = $orders->map(function ($order) {
            $requestItems = json_decode($order->request, true) ?: [];
            preg_match('/Общая сумма:\s*(\d+)/', strip_tags($order->message), $m);

            // Извлекаем названия из message (старые заказы) или из request (новые)
            preg_match_all('/Название:\s*<b>([^<]+)<\/b>.*?Количество:\s*<b>(\d+)<\/b>/Us', $order->message, $parsed);
            $items = [];
            for ($i = 0; $i < count($parsed[1]); $i++) {
                $title = $parsed[1][$i];
                $qty   = (int)$parsed[2][$i];
                $price = isset($requestItems[$i]['price']) ? (int)$requestItems[$i]['price'] : 0;
                // Если в request уже есть title (новые заказы) — используем его
                if (isset($requestItems[$i]['title'])) {
                    $title = $requestItems[$i]['title'];
                }
                $items[] = ['title' => $title, 'qty' => $qty, 'price' => $price];
            }
            // Если message не распарсился — берём из request напрямую
            if (empty($items)) {
                foreach ($requestItems as $ri) {
                    $items[] = [
                        'title' => isset($ri['title']) ? $ri['title'] : 'Вино',
                        'qty'   => (int)($ri['qty'] ?? 1),
                        'price' => (int)($ri['price'] ?? 0),
                    ];
                }
            }

            return [
                'id'          => $order->id,
                'date'        => $order->created_at->format('d.m.Y'),
                'total'       => isset($m[1]) ? (int)$m[1] : 0,
                'items_count' => array_sum(array_column($requestItems, 'qty')),
                'items'       => $items,
            ];
        });

        return response()->json(['orders' => $result]);
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

        $url = "https://solitary-flower-cfd6.pelivan96e.workers.dev/bot{$token}/sendMessage";
        $ch  = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            'chat_id'    => $chatId,
            'text'       => $text,
            'parse_mode' => 'HTML',
        ]));
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);

        curl_exec($ch);
        curl_close($ch);
    }
}
