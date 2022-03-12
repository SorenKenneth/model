<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Zalo\Zalo;

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
    return redirect('login');
//    $mail_to = "maodk@omt.vn";
//    $subject = "Hi a Mao";
//    $mail_from = "noreply@truongem.vn";
//    dd(Mail::send("abc", [], function ($message) use ($mail_to, $subject, $mail_from) {
//        $message->from($mail_from, 'No-reply');
//        $message->to($mail_to);
//        $message->subject($subject);
//    }));
});


Route::group(['namespace' => '\App\Http\Controllers\Api'], function (){
    Route::get('login-zalo', 'LoginWithZaloController@loginZalo');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
