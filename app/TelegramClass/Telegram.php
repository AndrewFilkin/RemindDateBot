<?php

namespace App\TelegramClass;

use Illuminate\Support\Facades\Http;

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
        $this->http::post(self::url.$this->bot.'/sendMessage', [
            'chat_id' => $chat_id,
            'parse_mode' => 'html',
            'text' => $message,
        ]);
    }
}
