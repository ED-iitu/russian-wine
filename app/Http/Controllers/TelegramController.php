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

        // Обработка callback кнопок
        if (isset($data['callback_query'])) {
            $callbackId = $data['callback_query']['id'];
            $chatId = $data['callback_query']['message']['chat']['id'];
            $callbackData = $data['callback_query']['data'];

            $this->answerCallbackQuery($callbackId);

            if ($callbackData === 'age_yes') {
                // Показываем основное меню
                $keyboard = [
                    'inline_keyboard' => [
                        [
                            ['text' => 'Помощь', 'callback_data' => 'help'],
                            ['text' => 'Контакты', 'callback_data' => 'contacts'],
                        ],
                        [
                            [
                                'text' => 'Открыть каталог вин 🍷',
                                'web_app' => ['url' => 'https://russianvine.ru/telegram-app']
                            ],
                        ]
                    ]
                ];
                $this->sendMessageWithKeyboard($chatId, 'Добро пожаловать в наш бот! Выберите одну из команд ниже:', $keyboard);
            } elseif ($callbackData === 'age_no') {
                $messageId = $data['callback_query']['message']['message_id'];

                // Отвечаем, чтобы Telegram не показывал "загрузку"
                $this->answerCallbackQuery($callbackId);
                // Удаляем кнопки
                $this->editMessageReplyMarkup($chatId, $messageId);
                $this->sendMessage($chatId, 'Вам нет 18 лет. Пожалуйста, покиньте бот.');
            } elseif ($callbackData === 'help') {
                $this->sendMessage($chatId, 'Помощь: Для дополнительных вопросов о заказах и винах напишите владельцу магазина @russianvine');
            } elseif ($callbackData === 'contacts') {
                $this->sendMessage($chatId, 'Контакты: russianvine.ru/where-to-buy');
            }

            return response('OK', 200);
        }

        // Обработка текста
        if (isset($data['message']['text'])) {
            $chatId = $data['message']['chat']['id'];
            $text = $data['message']['text'];

            if ($text === '/start') {
                $keyboard = [
                    'inline_keyboard' => [
                        [
                            ['text' => 'Да', 'callback_data' => 'age_yes'],
                            ['text' => 'Нет', 'callback_data' => 'age_no'],
                        ]
                    ]
                ];
                $this->sendMessageWithKeyboard($chatId, 'Вам есть 18 лет?', $keyboard);
            } elseif ($text === '/store') {
                $keyboard = [
                    'inline_keyboard' => [
                        [
                            [
                                'text' => 'Открыть каталог вин 🍷',
                                'web_app' => ['url' => 'https://russianvine.ru']
                            ],
                        ]
                    ]
                ];
                $this->sendMessageWithKeyboard($chatId, 'Нажмите кнопку ниже, чтобы открыть каталог вин:', $keyboard);
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

    private function editMessageReplyMarkup($chatId, $messageId)
    {
        $url = "https://api.telegram.org/bot7472810776:AAEZls-YtfWyL0T9mnzQFXnukSAnOg-owoo/editMessageReplyMarkup";
        $data = [
            'chat_id' => $chatId,
            'message_id' => $messageId,
            'reply_markup' => json_encode(['inline_keyboard' => []]) // удаляет кнопки
        ];

        $this->sendTelegramRequest($url, $data);
    }

    private function sendTelegramRequest($url, $data)
    {
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