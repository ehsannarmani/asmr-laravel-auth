<?php

use Carbon\Carbon;
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
    return view('welcome');
});

Route::get('/time', function () {
    $time = Carbon::today()->timestamp;
    $everyMin = 3;
    $everyTimestamp = $everyMin * 60;
    $items = [];
    for ($i = 0; $i < (24 * 60 * 60) / $everyTimestamp; $i++) {
        $items[] = Carbon::parse($time)->format("H:i");
        $time += $everyTimestamp;
    }
    dd(join(", ", $items));
});
