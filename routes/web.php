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
if (config('app.enable_see_result')) {
    Route::get('/result', 'ResultController@result')->name('vote.result');
}
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/ketang', 'HomeController@ketang')->name('home.ketang');
Route::get('/profile', 'HomeController@profile')->name('home.profile');
Route::get('/identity/{identifier}', 'IdentifierController@show')->name('vote.identifier');
if (!config('app.is_vote_ended')){
    if(config('app.enable_vote')) {
        Route::get('/vote', 'VoteController@show')->name('home.vote');
        Route::post('/vote/submit', 'VoteController@submit')->name('vote.submit');
    if(config('app.enable_claim_token')) {
        Route::get('/token', 'TokenController@claim')->name('home.token');
        Route::post('/token/generate', 'TokenController@store')->name('token.generate');
}

}
Route::post('/token/notice/read', 'TokenController@mark_notice')->name('token.notice.mark-notice');

}
Route::get('LxEadEhHoF6jkvxDIuWi', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
