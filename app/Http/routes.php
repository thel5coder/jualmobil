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
Route::get('/login', ['uses' => 'UserController@login', 'as' => 'login']);
Route::post('/login', ['uses' => 'UserController@doLogin', 'as' => 'doLogin']);
Route::get('/logout', ['uses' => 'UserController@logout', 'as' => 'logout']);
Route::get('/register', ['as' => 'registerForm', 'uses' => 'UserController@register']);
Route::post('/user-register', ['uses' => 'UserController@doRegister', 'as' => 'register']);
Route::get('/user-confirmation/{token}/{id}', ['uses' => 'UserController@confirmation', 'as' => 'confirmation']);

Route::group(['midleware' => 'auth'], function () {
    Route::get('dashboard',['uses' => 'UserController@dashboard' , 'as' => 'dashboard']);
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
});
