<?php

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
    return view('pages.index');
});

Route::get('/createStore', 'StoresController@create');

Route::post('/createStore', 'StoresController@store');

Route::get('/viewStores', 'StoresController@index');

Route::get('/viewStores/{storeID}', 'StoresController@show');

Route::get('/updateStore/{storeID}', 'StoresController@edit');

Route::put('/updateStore/{storeID}', 'StoresController@update');