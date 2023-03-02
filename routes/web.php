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

function form() {
    echo '<FORM method="get" action="/test"><input type="text" name="search"><button type="submit">OK</button></FORM>';
}

Route::get('/scratch', function (\Illuminate\Http\Request $request) {
    $idx = rand(1, 758538395);
    $url = "https://scratch.mit.edu/projects/$idx/";
    $response = Http::get($url);
    $html = $response->body();
    //dump($html);
    if (str_contains($html, 'not-available-image')) {
        echo "<BR>$url doesn't exist";
    } else {
        echo "<BR><A href='$url'>$url</A>";
    }
});

Route::get('/test', function (\Illuminate\Http\Request $request) {
    form();
    $val = $request->get('search');
   // dump($val);
    //return 'some';
//  $url = 'https://yandex.ru/images/search?text=%D0%BD%D0%BE%D0%B2%D1%8B%D0%B9%20%D0%B3%D0%BE%D0%B4';
  //  $url = 'https://yandex.ru/images/search?text=кот%20в%20пончике';
    $url = 'https://yandex.ru/images/search?text='.$val;
    $response = Http::get($url);
    //dump($response->body());

    // Create DOM from URL or file
    $html = $response->body();

    $dom = new DOMDocument;
    @$dom->loadHTML($html);
    $images = $dom->getElementsByTagName('img');
    $imagesArr = [];
    foreach ($images as $image) {
        // echo '<IMG src="' . $image->getAttribute('src') . '">';
        // $image->setAttribute('src', 'http://example.com/' . $image->getAttribute('src'));
        $imagesArr[] = $image->getAttribute('src');
    }

    $idx = rand(0, count($imagesArr) - 1);
    echo '<IMG src="' . $imagesArr[$idx] . '">';

});

Route::get('/', function () {
    form();
    return '';
   // return phpinfo();
    /*$test = cache()->remember('testkey4', null, fn() => 'test3');
    $store = cache()->getStore();
    var_dump($store->get('mycounter'));*/


   // dump($images);

    //dump($html);
// Find all images
  /*  foreach($html->find('img') as $element)
        echo $element->src . '<br>';
// Find all links
    foreach($html->find('a') as $element)
        echo $element->href . '<br>';
*/
   // var_dump($store);
    //$redis = Cache::getRedis();
    //$redis->remember();
    //$a_keys = $redis->keys("*");
   //var_dump($a_keys);
   // return $test;
    //return view('posts');

    return '';
});
