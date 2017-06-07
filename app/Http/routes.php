<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('mail.newuserregister');
});
Route::get('/login','UserController@login');
Route::post('/login','UserController@doLogin');
Route::get('/register','UserController@register');
Route::post('/user-register',['uses' =>'UserController@doRegister','as' => 'register']);

Route::get('daftarmobil', function () {
    return view('daftarmobil');
});
Route::get('buatiklan', function () {
    return view('buatiklan');
});
Route::get('tambahmerk', function () {
    return view('tambahmerk');
});
Route::get('tambahmodel', function () {
    return view('tambahmodel');
});
Route::get('tambahtipe', function () {
    return view('tambahtipe');
});

Route::get('/user-confirmation/{token}',['uses' => 'UserController@confirmation' , 'as' => 'confirmation']);
