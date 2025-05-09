<?php

namespace App\Observers;

use App\Models\TelegramMessage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TelegramMessageObserver
{
    /**
     * Handle the telegram message "created" event.
     *
     * @param  \App\TelegramMessage  $telegramMessage
     * @return void
     */
    public function created(TelegramMessage $message)
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $chatId   = 159875996;

        if ($message->image) {
            $imagePath = Storage::disk('public')->path($message->image);

            Http::attach(
                'photo',
                file_get_contents($imagePath),
                basename($imagePath)
            )->post("https://api.telegram.org/bot{$botToken}/sendPhoto", [
                'chat_id' => $chatId,
                'caption' => $message->message,
                'parse_mode' => 'HTML'
            ]);
        } else {
            Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
                'chat_id' => $chatId,
                'text' => $message->message,
                'parse_mode' => 'HTML'
            ]);
        }
    }

    /**
     * Handle the telegram message "updated" event.
     *
     * @param  \App\TelegramMessage  $telegramMessage
     * @return void
     */
    public function updated(TelegramMessage $telegramMessage)
    {
        //
    }

    /**
     * Handle the telegram message "deleted" event.
     *
     * @param  \App\TelegramMessage  $telegramMessage
     * @return void
     */
    public function deleted(TelegramMessage $telegramMessage)
    {
        //
    }

    /**
     * Handle the telegram message "restored" event.
     *
     * @param  \App\TelegramMessage  $telegramMessage
     * @return void
     */
    public function restored(TelegramMessage $telegramMessage)
    {
        //
    }

    /**
     * Handle the telegram message "force deleted" event.
     *
     * @param  \App\TelegramMessage  $telegramMessage
     * @return void
     */
    public function forceDeleted(TelegramMessage $telegramMessage)
    {
        //
    }
}
