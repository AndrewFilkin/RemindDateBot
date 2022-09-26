<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\TelegramClass\Telegram;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Order $order, Request $request, Telegram $telegram)
    {
        $key = base64_encode(md5(uniqid()));
        $order->create([
            'name' => $request->input('name'),
            'email' => $request->input('email2'),
            'product' => $request->input('product'),
            'secret_key' => $key,
        ]);

        $field_data = $order->where('secret_key', $key)->first();

        $data = [
            'id' => $field_data->id,
            'name' => $field_data->name,
            'email' => $field_data->email,
            'product' => $field_data->product,
        ];


        $buttons = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'Принять',
                    'callback_data' => '1|'.$key,
                ],
            ],
            [
                [
                    'text' => 'Отклонить',
                    'callback_data' => '0|'.$key,
                ]
            ],
        ]
    ];

        $telegram->sendButtons(env('REPORT_TELEGRAM_ID'), (string)view('site.message.new_order', $data), $buttons);
        return response()->redirectTo('/');
    }
}
