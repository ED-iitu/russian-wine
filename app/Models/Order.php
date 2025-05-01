<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Order extends Model
{
    const TYPE_TASTING = 1;
    const TYPE_TOUR = 2;
    const TYPE_NOMINAL_WINE = 3;
    const TYPE_FRANCHISE = 4;
    const TYPE_CART = 5;
    const TYPE_FAVORITE = 6;
    const TYPE_QUESTION = 7;

    public static function getTotalOrdersAmount()
    {
        // Получаем все заказы
        $orders = self::all();

        $totalAmount = 0;

        // Проходим по всем заказам
        foreach ($orders as $order) {
            Log::info($order->message);
            // Проверяем, если поле message не пустое
            if (empty($order->message)) {
                continue;
            }

            // Ищем число после "Общая сумма: " (обновленное регулярное выражение)
            preg_match('/Общая сумма[:\s]*([\d,]+)/', $order->message, $matches);

            // Если найдено число, добавляем его к общей сумме
            if (isset($matches[1])) {
                // Преобразуем сумму в число, удалив запятые, если они есть
                $amount = str_replace(',', '', $matches[1]);
                $totalAmount += (int)$amount;
            }
        }

        return $totalAmount;
    }

}
