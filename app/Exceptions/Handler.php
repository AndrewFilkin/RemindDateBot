<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\TelegramClass\Telegram;

class Handler extends ExceptionHandler
{

    protected $telegram;

    public function __construct(Telegram $telegram)
    {
        $this->telegram = $telegram;
    }


    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];


    public function report(Throwable $e)
    {

//        $data = [
//            'description' => $e->getMessage(),
//            'file' => $e->getFile(),
//            'line' => $e->getLine(),
//        ];
//
//        Http::post('https://api.telegram.org/bot5739064178:AAFefWL-4rMZMI82rmUfIzGmbB-js12t7CQ/sendMessage', [
//            'chat_id' => 404886081,
//            'parse_mode' => 'html',
//            'text' => (string)view('report', $data),
//        ]);

        $data = [
            'description' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
        ];

        $this->telegram->sendMessage(404886081, (string)view('report', $data));

    }

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
