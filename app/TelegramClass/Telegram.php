<?php

namespace App\TelegramClass;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class Telegram
{


    protected $http;
    protected $bot;
    const url = 'https://api.telegram.org/bot';

    public function __construct(Http $http, $bot = '5739064178:AAFefWL-4rMZMI82rmUfIzGmbB-js12t7CQ')
    {
        $this->http = $http;
        $this->bot = $bot;
    }

    public function sendMessage($chat_id, $message)
    {
        return $this->http::post(self::url . $this->bot . '/sendMessage', [
            'chat_id' => $chat_id,
            'parse_mode' => 'html',
            'text' => $message,
        ]);
    }

    public function sendDocument($chat_id, $file_path, $reply_id = null)
    {
        return $this->http::attach('document', Storage::get($file_path), 'document.png')->post(self::url . $this->bot . '/sendDocument', [
            'chat_id' => $chat_id,
            'reply_to_message_id' => $reply_id,

        ]);
    }
}
