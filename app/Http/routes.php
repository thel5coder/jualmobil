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
    return view('index');
});
Route::get('login','UserController@login');
Route::get('register', function () {
    return view('register');
});
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

Route::get('/user-confirmation/{token}',[]);
