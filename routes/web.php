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

Route::get('/', function () {
//    Illuminate\Support\Facades\Http::post('https://api.telegram.org/bot5739064178:AAFefWL-4rMZMI82rmUfIzGmbB-js12t7CQ/sendMessage', [
//        'chat_id' => 404886081,
//        'parse_mode' => 'html',
//        'text' => '<b>Hello Bot</b>',
//    ]);

    return view('welcome');
});
