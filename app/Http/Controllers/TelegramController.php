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

        Log::info('Telegram Data: ' . json_encode($data));

        // Обработка нажатия кнопок
        if (isset($data['callback_query'])) {
            $callbackId = $data['callback_query']['id'];
            $chatId = $data['callback_query']['message']['chat']['id'];
            $callbackData = $data['callback_query']['data'];

            // Ответ на callback (убирает крутилку)
            $this->answerCallbackQuery($callbackId);

            // Ответ в чат
            if ($callbackData === 'help') {
                $this->sendMessage($chatId, 'Помощь: Для дополнительных вопросов напишите Владельцу магазина @russianvine');
            } elseif ($callbackData === 'contacts') {
                $this->sendMessage($chatId, 'Контакты: russianvine.ru/where-to-buy');
            }

            return response('OK', 200);
        }

        // Обработка обычных сообщений
        if (isset($data['message']['text'])) {
            $chatId = $data['message']['chat']['id'];
            $text = $data['message']['text'];

            if ($text === '/start') {
                $keyboard = [
                    'inline_keyboard' => [
                        [
                            ['text' => 'Помощь', 'callback_data' => 'help'],
                            ['text' => 'Контакты', 'callback_data' => 'contacts'],
                        ],
                        [
                            [
                                'text' => 'Открыть каталог вин 🍷',
                                'web_app' => ['url' => 'https://russianvine.ru/telegram-app'] // сюда подставь ссылку на твою mini app
                            ],
                        ]
                    ]
                ];

                $this->sendMessageWithKeyboard($chatId, 'Добро пожаловать в наш бот! Выберите одну из команд ниже:', $keyboard);
            }
        }

        return response('OK', 200);
    }

    private function answerCallbackQuery($callbackQueryId)
    {
        $url = "https://api.telegram.org/bot" . '7472810776:AAEZls-YtfWyL0T9mnzQFXnukSAnOg-owoo' . "/answerCallbackQuery";

        $data = [
            'callback_query_id' => $callbackQueryId,
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