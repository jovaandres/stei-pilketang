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
    if (Auth::check()) {
        return redirect()->route('login');
    } else {
        return redirect()->route('home');
    }
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/ketang', 'HomeController@ketang')->name('home.ketang');
Route::get('/profile', 'HomeController@profile')->name('home.profile');
if(config('app.enable_vote')) {
    Route::get('/vote', 'VoteController@show')->name('home.vote');
    Route::post('/vote/submit', 'VoteController@submit')->name('vote.submit');
}
Route::post('/token/notice/read', 'TokenController@mark_notice')->name('token.notice.mark-notice');
if(config('app.enable_claim_token')) {
    Route::get('/token', 'TokenController@claim')->name('home.token');
    Route::post('/token/generate', 'TokenController@store')->name('token.generate');
}
