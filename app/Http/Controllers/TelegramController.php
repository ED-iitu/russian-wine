<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    public function webhook(Request $request)
    {
        $data = $request->all();

        // Проверяем, есть ли текст и это команда /start
        if (isset($data['message']['text']) && $data['message']['text'] === '/start') {
            $chatId = $data['message']['chat']['id'];
            $this->sendMessage($chatId, 'Добро пожаловать! Вы начали работу с ботом.');
        }

        return response('OK', 200);
    }

    private function sendMessage($chatId, $text)
    {
        $token = env('7472810776:AAEZls-YtfWyL0T9mnzQFXnukSAnOg-owoo');

        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
        ]);
    }
}