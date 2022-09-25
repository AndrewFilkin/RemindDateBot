<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function (\App\TelegramClass\Telegram $telegram) {
////    Illuminate\Support\Facades\Http::post('https://api.telegram.org/bot5739064178:AAFefWL-4rMZMI82rmUfIzGmbB-js12t7CQ/sendMessage', [
////        'chat_id' => 404886081,
////        'parse_mode' => 'html',
////        'text' => '<b>Hello Bot</b>',
////    ]);
//
////    $sendMessage = $telegram->sendMessage('404886081', 'test');
////    $sendMessage = json_decode($sendMessage);
////    $http = $telegram->sendDocument('404886081', '/public/1.png', $sendMessage->result->message_id);
////    dd($http->body());
//
////    $x = Storage::get('/public/1.png');
////    dd($x);
//
////    return view('welcome');
//
//    $buttons = [
//        'inline_keyboard' => [
//            [
//                [
//                    'text' => 'button1',
//                    'callback_data' => '1',
//                ],
//            ],
//            [
//                [
//                    'text' => 'button2',
//                    'callback_data' => '2',
//                ]
//            ],
//        ]
//    ];
//    $sendButton = $telegram->sendButtons('404886081', 'test', json_encode($buttons));
//    $sendButton = json_decode($sendButton);
//    dd($sendButton);
//
//});

Route::get('/', function (\App\Models\Order $order) {
    return view('site.order', ['orders'=>$order->active()->get()]);
});

Route::group(['namespace' => 'App\Http\Controllers'], function (){
    Route::post('/order/store', 'OrderController@store')->name('order.store');
//    Route::post('/webhook', 'WebhookController@index');
//    Route::post('/post/store', 'PostController@store')->name('post.store');
});
