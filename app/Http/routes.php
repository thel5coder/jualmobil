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

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);
Route::get('/login',    ['uses' => 'UserController@login', 'as' => 'login']);
Route::post('/login',   ['uses' => 'UserController@doLogin', 'as' => 'doLogin']);
Route::get('/logout',   ['uses' => 'UserController@logout', 'as' => 'logout']);
Route::get('/register', ['as' => 'registerForm', 'uses' => 'UserController@register']);
Route::post('/user-register', ['uses' => 'UserController@doRegister', 'as' => 'register']);
Route::get('/user-confirmation/{token}/{id}', ['uses' => 'UserController@confirmation', 'as' => 'confirmation']);

Route::get('berita',            ['uses' => 'BeritaController@showAll', 'as' => 'berita']);
Route::get('berita/{slug}',     ['uses' => 'BeritaController@show' ,'as' => 'beritaSlug']);
Route::get('berita/kategori/{kategori}', ['uses' => 'BeritaController@showByKategoriSlug' ,'as'=> 'kategoriSlug']);

Route::get('iklan',             ['uses' => 'ListingMobilController@showAll' , 'as' => 'iklan']);
Route::get('iklan/{id}',        ['uses' => 'ListingMobilController@show' , 'as' => 'iklanId']);

Route::group(['middleware' => 'auth','prefix'=>'backend'], function () {

    Route::get('/dashboard',           ['uses' => 'UserController@dashboard' , 'as' => 'dashboard']);
    Route::post('/user/update/{id}',   ['uses' => 'UserController@update' , 'as' => 'updateuser']);

    Route::get('/listing',              ['uses' => 'ListingMobilController@index','as' => 'listing']);
    Route::post('/listing',             ['uses' => 'ListingMobilController@pagination','as' => 'pagination']);
    Route::get('/listing/read/{id}',    ['uses' => 'ListingMobilController@read' ,'as' => 'read']);
    Route::get('/lisitng/create',       ['uses' => 'ListingMobilController@create' ,'as' => 'formbuatiklan']);
    Route::post('/listing/create',      ['uses' => 'ListingMobilController@store' ,'as' => 'postiklan']);
    Route::get('/listing/edit/{id}',    ['uses' => 'ListingMobilController@edit' ,'as' => 'editIklan']);
    Route::post('/listing/update',      ['uses' => 'ListingMobilController@update' , 'as' => 'updateIklan']);
    Route::get('/listing/delete/{id}',  ['uses' => 'ListingMobilController@destroy','as' => 'deleteiklan.id']);
    Route::get('/listing/getmerk',      ['uses' => 'MerkController@showAll' ,'as' => 'getmerk']);
    Route::get('/listing/getmodel/{merklId}',   ['uses' => 'ModelController@ShowByMerkId' ,'as' => 'getmodel.id']);
    Route::get('/listing/gettipe/{modelId}',    ['uses' => 'TipeController@ShowByModelId' ,'as' => 'gettipe.id']);
    Route::get('/listing/getprovinsi',          ['uses' => 'ProvinsiController@showAll' ,'as' => 'getprovinsi']);
    Route::get('/listing/getkota/{provinsiId}', ['uses' => 'KotaController@ShowByProvinsiId','as' => 'getkota.id']);
    Route::post('/listing/setstatusiklan',      ['uses' => 'ListingMobilController@setStatusIklan', 'as' => 'setStatusIklan']);

    Route::get('/berita',            ['uses' => 'BeritaController@index' , 'as' => 'beritaBackend']);
    Route::post('/berita',                  ['uses' => 'BeritaController@pagination' , 'as' => 'paginationBerita']);
    Route::get('/berita/read/{slug}',       ['uses' => 'BeritaController@read' , 'as' => 'readBerita']);
    Route::get('/berita/create',            ['uses' => 'BeritaController@create' , 'as' => 'formBerita']);
    Route::post('/berita/create',           ['uses' => 'BeritaController@store' , 'as' => 'postBerita']);
    Route::get('/berita/edit/{slug}',       ['uses' => 'BeritaController@edit' , 'as' => 'berita.edit']);
    Route::post('/berita/update',           ['uses' => 'BeritaController@update', 'as' => 'berita.update']);
    Route::get('/berita/delete/{id}',       ['uses' => 'BeritaController@destroy','as' => 'berita.delete']);
    Route::post('/berita/setstatusberita',  ['uses' => 'BeritaController@setStatusBerita', 'as' => 'setStatus']);

    Route::get('/merk',             ['uses' => 'MerkController@index' , 'as' => 'formMerk']);
    Route::post('/merk/create',     ['uses' => 'MerkController@store' , 'as' => 'postMerk']);
    Route::get('/merk/delete/{id}', ['uses' => 'MerkController@delete', 'as' => 'delete.merk']);

    Route::get('/model',             ['uses' => 'ModelController@create' , 'as'  => 'formModel']);
    Route::post('/model/create',     ['uses' => 'ModelController@store' , 'as' => 'postModel']);
    Route::get('/model/delete/{id}', ['uses' => 'ModelController@delete' , 'as' => 'model.delete']);

    Route::get('/tipe',             ['uses' => 'TipeController@create' , 'as' => 'formTipe']);
    Route::post('/tipe/store',      ['uses' => 'TipeController@store' , 'as' => 'postTipe']);
    Route::get('/tipe/delete/{id}', ['uses' => 'TipeController@delete' , 'as' => 'tipe.delete']);

    Route::get('/kategori',['uses' => 'KategoriController@index' , 'as' => 'kategori']);
    Route::post('/kategori/store',['uses' => 'KategoriController@store' , 'as' => 'addkategori']);
    Route::get('/kategori/delete/{id}',['uses' => 'KategoriController@delete' , 'as' => 'deleteKategori']);

    Route::post('/komentar/create', ['uses' => 'KomentarController@create' , 'as' => 'komentar']);
});
