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
        $token = env('7472810776:AAEZls-YtfWyL0T9mnzQFXnukSAnOg-owoo');

        Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $text,
        ]);
    }
}