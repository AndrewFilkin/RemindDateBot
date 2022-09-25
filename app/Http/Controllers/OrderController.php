<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\TelegramClass\Telegram;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Order $order, Request $request, Telegram $telegram)
    {
        $order->create([
            'name' => $request->input('name'),
            'email' => $request->input('email2'),
            'product' => $request->input('product'),
        ]);

        $data = [
            'id' => $order->id,
            'name' => $order->name,
            'email' => $order->email,
            'product' => $order->product,
        ];

        $buttons = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'Принять',
                    'callback_data' => '',
                ],
            ],
            [
                [
                    'text' => 'Отклонить',
                    'callback_data' => '',
                ]
            ],
        ]
    ];

        $telegram->sendButtons(env('REPORT_TELEGRAM_ID'), (string)view('site.message.new_order', $data), $buttons);
        return response()->redirectTo('/');
    }
}
