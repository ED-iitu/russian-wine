<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    public function webhook(Request $request)
    {
        Log::info('TELEGRAM DATA: ' . json_encode($request->all()));

        $data = $request->all();

        if (isset($data['message']['text']) && $data['message']['text'] === '/start') {
            $chatId = $data['message']['chat']['id'];
            $this->sendMessage($chatId, 'Привет! Добро пожаловать в бота 🎉');
        }

        return response('OK', 200);
    }

    private function sendMessage($chatId, $text)
    {
        $url = "https://api.telegram.org/bot" . '7472810776:AAEZls-YtfWyL0T9mnzQFXnukSAnOg-owoo' . "/sendMessage";

        $data = [
            'chat_id' => $chatId,
            'text' => $text,
        ];

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => http_build_query($data),
            ],
        ];

        $context = stream_context_create($options);
        $response = file_get_contents($url, false, $context);

        Log::info('Telegram API Response: ' . $response);
    }

}