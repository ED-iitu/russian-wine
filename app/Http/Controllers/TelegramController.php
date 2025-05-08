<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    public function webhook(Request $request)
    {
        $data = $request->all();

        // Логирование входящего сообщения
        Log::info('Telegram Data: ' . json_encode($data));

        if (isset($data['message']['text'])) {
            $chatId = $data['message']['chat']['id'];
            $text = $data['message']['text'];

            // Обрабатываем команду /start
            if ($text === '/start') {
                $keyboard = [
                    'inline_keyboard' => [
                        [
                            ['text' => 'Помощь', 'callback_data' => 'help'],
                            ['text' => 'Контакты', 'callback_data' => 'contacts'],
                        ],
                        [
                            ['text' => 'Посмотреть каталог вин', 'callback_data' => 'store'],
                        ]
                    ]
                ];

                $this->sendMessageWithKeyboard($chatId, 'Добро пожаловать в наш бот! Выберите одну из команд ниже:', $keyboard);
            }

            // Обрабатываем другие команды, например /help
            elseif ($text === '/help') {
                $this->sendMessage($chatId, 'Помощь: Используй команду /order для оформления заказа или /catalog для просмотра каталога.');
            }

            // Обрабатываем команду /order
            elseif ($text === '/order') {
                $this->sendMessage($chatId, 'Для оформления заказа перейдите по ссылке...');
            }

            // Обрабатываем команду /catalog
            elseif ($text === '/catalog') {
                $this->sendMessage($chatId, 'Вот наш каталог вин...');
            }
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

    private function sendMessageWithKeyboard($chatId, $text, $keyboard)
    {
        $url = "https://api.telegram.org/bot" . '7472810776:AAEZls-YtfWyL0T9mnzQFXnukSAnOg-owoo' . "/sendMessage";

        $data = [
            'chat_id' => $chatId,
            'text' => $text,
            'reply_markup' => json_encode($keyboard),
        ];

        $options = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => http_build_query($data),
            ],
        ];

        $context = stream_context_create($options);
        file_get_contents($url, false, $context);
    }


}