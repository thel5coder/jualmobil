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
Route::get('/login',    ['uses' => 'UserController@login', 'as' => 'login']);
Route::post('/login',   ['uses' => 'UserController@doLogin', 'as' => 'doLogin']);
Route::get('/logout',   ['uses' => 'UserController@logout', 'as' => 'logout']);
Route::get('/register', ['as' => 'registerForm', 'uses' => 'UserController@register']);
Route::post('/user-register', ['uses' => 'UserController@doRegister', 'as' => 'register']);
Route::get('/user-confirmation/{token}/{id}', ['uses' => 'UserController@confirmation', 'as' => 'confirmation']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard',         ['uses' => 'UserController@dashboard' , 'as' => 'dashboard']);
    Route::get('/listing',          ['uses' => 'ListingMobilController@index','as' => 'listing']);
    Route::post('/listing',          ['uses' => 'ListingMobilController@pagination','as' => 'pagination']);
    Route::get('/listing/read/{id}', ['uses' => 'ListingMobilController@read' ,'as' => 'read']);
    Route::get('/lisitng/create',   ['uses' => 'ListingMobilController@create' ,'as' => 'formbuatiklan']);
    Route::post('/listing/create',  ['uses' => 'ListingMobilController@store' ,'as' => 'postiklan']);
    Route::get('/listing/delete/{id}',  ['uses' => 'ListingMobilController@destroy','as' => 'deleteiklan.id']);
    Route::get('/listing/getmerk',      ['uses' => 'MerkController@showAll' ,'as' => 'getmerk']);
    Route::get('/listing/getmodel/{merklId}',   ['uses' => 'ModelController@ShowByMerkId' ,'as' => 'getmerk.id']);
    Route::get('/listing/gettipe/{modelId}',    ['uses' => 'TipeController@ShowByModelId' ,'as' => 'getmodel.id']);
    Route::get('/listing/getprovinsi',          ['uses' => 'ProvinsiController@shoAll' ,'as' => 'getprovinsi']);
    Route::get('/listing/getkota/{provinsiId}', ['uses' => 'KotaCOntroller@ShowByProvinsiId','as' => 'getkota.id']);

    Route::get('/berita', ['uses' => 'BeritaController@index' , 'as' => 'berita']);
    Route::get('/berita/create',    ['uses' => 'BeritaController@create' , 'as' => 'formBerita']);
    Route::post('/berita/create',   ['uses' => 'BeritaController@strore' , 'as' => 'postBerita']);
    Route::get('/berita/edit/{id}', ['uses' => 'BeritaController@edit' , 'as' => 'berita.edit']);
    Route::post('/berita/update/{id',   ['uses' => 'BeritaController@update', 'as' => 'berita.update']);
    Route::get('/berita/delete/{id}',   ['uses' => 'BeritaController@destroy','as' => 'berita.delete']);

    Route::get('/merk', ['uses' => 'MerkController@index' , 'as' => 'merk']);
    Route::get('/merk/create',      ['uses' => 'MerkController@create' ,'as' => 'formMerk']);
    Route::post('/merk/create',     ['uses' => 'MerkController@store' , 'as' => 'postMerk']);
    Route::get('/merk/edit/{id}' ,  ['uses' => 'MerkController@edit', 'as' => 'edit.merk']);
    Route::post('merk/update/{id}', ['uses' => 'MerkController@update' , 'as' => 'merk.update']);
    Route::get('/merk/delete/{id}', ['uses' => 'MerkController@destroy', 'as' => 'delete.merk']);

    Route::get('/model/create', ['uses' => 'ModelController@create' , 'as'  => 'formModel']);
    Route::post('/model/create', ['uses' => 'ModelController@store' , 'as' => 'postModel']);
    Route::get('/model/edit/{id}', ['uses' => 'ModelController@edit' , 'as' => 'model.edit']);
    Route::post('/model/update/{id}', ['uses' => 'ModelController@update', 'as' => 'model.update']);
    Route::get('/model/delete/{id}', ['uses' => 'ModelController@destroy' , 'as' => 'model.delete']);

    Route::get('/tipe/create', ['uses' => 'TipeController@create' , 'as' => 'formTipe']);
    Route::post('/tipe/create',['uses' => 'TipeController@store' , 'as' => 'postTipe']);
    Route::get('/tipe/edit/{id}', ['uses' => 'TipeController@edit', 'as' => 'tipe.edit']);
    Route::post('/tipe/update/{id}', ['uses' => 'TipeController@update' ,'as' => 'tipe.update']);
    Route::get('/tipe/delete/{id}', ['uses' => 'TipeController@destry' , 'as' => 'tipe.delete']);
});
