<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mail\IndexController as SendMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function createOrder(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
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

            $order_product = [
                'title' => $item['title'],
                'model' => $item['model'],
                'type' => $type,
                'qty' => $item['quantity'],
                'price' => (int)$item['price'],
                'total_price' => (int)$item['price'] * $item['quantity'],
            ];

            $orders[]   = $order_product;
            $cart_info .= 'Название: <b>' . $item['title'] . '</b> Тип продуката: <b>' . $type . '. </b>Количество: <b>' . $item['quantity'] . '</b> штук <br>  ';
        }

        $cart_info .= 'Общая сумма: <b>' . $validated['total'] . '</b>';

        $saveRequest = new Order();
        $saveRequest->name    = $validated['name'];
        $saveRequest->phone   = $validated['phone'];
        $saveRequest->email   = $validated['email'];
        $saveRequest->type    = Order::TYPE_CART;
        $saveRequest->message = $cart_info;
        $saveRequest->request = $requestData;
        $saveRequest->save();

        $emailData = [
            'name'     => $request['name'],
            'email'    => $request['email'],
            'total'    => $validated['total'],
            'orders'   => $orders,
            'order_id' => $saveRequest->id,
            'phone'    => $request['phone'],
        ];

        SendMail::order($emailData);

        // Возвращаем ответ
        return response()->json([
            'message' => 'Заказ успешно создан',
        ], 201);
    }
}