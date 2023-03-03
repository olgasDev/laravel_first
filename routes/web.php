<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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
Route::get('/', function (\Illuminate\Http\Request $request) {

    phpinfo();

    $out = [];
    //$res = ['version' => '1.0', 'end_session'=> false, 'session_id' => $in->session->session_id ?? '', 'message_id' => $in->session->message_id ?? '', 'user_id' =>  $in->session->user_id ?? ''];

    $in = $request->attributes;
    dd($in);
    $out['version'] = '1.0';
    $out['response']['end_session'] = false;
    $out['session']['session_id'] =  $in->session->session_id ?? '';
    $out['session']['message_id'] =  $in->session->message_id ?? '';
    $out['session']['user_id'] =  $in->session->user_id ?? '';
});

Route::get('/user', [\App\Http\Controllers\TestBotController::class, 'index']);
