<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TweetController;

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
Route::get('/tweet', [TweetController::class, 'getAllTweet'])->name('tweet.index');
Route::get('/tweet/direct', [TweetController::class, 'getTweetDirect'])->name('tweet.direct');
Route::get('/tweet/cache', [TweetController::class, 'getAllCache'])->name('tweet.cache');
Route::post('/tweet/like', [TweetController::class, 'likeTweet'])->name('tweet.like');




