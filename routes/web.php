<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

//include_once('alice.php');



ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


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
Route::any('/', function (\Illuminate\Http\Request $request) {

//answer('два-два-два');
//die;


//Log::debug($request);
//    Log::debug($request->attributes);

  //  return new \Illuminate\Http\JsonResponse(['version' => '1.0', 'end_session'=> false, 'response' => ['text' => 'Что-то получилось']]);
   

    $in = $request->getContent();
    $out = [];
    $out['version'] = '1.0';
    $out['response']['end_session'] = false;
    $out['session']['session_id'] =  $in->session->session_id ?? '';
    $out['session']['message_id'] =  $in->session->message_id ?? '';
    $out['session']['user_id'] =  $in->session->user_id ?? '';
    $out['response']['text'] = 'Что-то новенькое';
    
     return new \Illuminate\Http\JsonResponse($out);
});

Route::get('/user', [\App\Http\Controllers\TestBotController::class, 'index']);
