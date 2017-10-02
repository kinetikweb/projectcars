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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/brands', 'BrandController@index');
Route::get('/brands/create', 'BrandController@create')->middleware('admin');
Route::post('/brands', 'BrandController@store')->middleware('admin');
Route::get('/brands/{id}', 'BrandController@show');
Route::get('/brands/{id}/edit', 'BrandController@edit')->middleware('admin');
Route::put('/brands/{id}', 'BrandController@update')->middleware('admin');
Route::delete('/brands/{id}', 'BrandController@destroy')->middleware('admin');

Route::get('/engines', 'EngineController@index');
Route::get('/engines/create', 'EngineController@create')->middleware('admin');
Route::post('/engines', 'EngineController@store')->middleware('admin');
Route::get('/engines/{id}', 'EngineController@show');
Route::get('/engines/{id}/edit', 'EngineController@edit')->middleware('admin');
Route::put('/engines/{id}', 'EngineController@update')->middleware('admin');
Route::delete('/engines/{id}', 'EngineController@destroy')->middleware('admin');

Route::get('/colors', 'ColorController@index');
Route::get('/colors/create', 'ColorController@create')->middleware('admin');
Route::post('/colors', 'ColorController@store')->middleware('admin');
Route::get('/colors/{id}', 'ColorController@show');
Route::get('/colors/{id}/edit', 'ColorController@edit')->middleware('admin');
Route::put('/colors/{id}', 'ColorController@update')->middleware('admin');
Route::delete('/colors/{id}', 'ColorController@destroy')->middleware('admin');

Route::get('/models', 'ModelbController@index');
Route::get('/models/create', 'ModelbController@create')->middleware('admin');
Route::post('/models', 'ModelbController@store')->middleware('admin');
Route::get('/models/{id}', 'ModelbController@show');
Route::get('/models/{id}/edit', 'ModelbController@edit')->middleware('admin');
Route::put('/models/{id}', 'ModelbController@update')->middleware('admin');
Route::delete('/models/{id}', 'ModelbController@destroy')->middleware('admin');

Route::get('/cars', 'CarController@index');
Route::get('/cars/create', 'CarController@create')->middleware('admin');
Route::post('/cars', 'CarController@store')->middleware('admin');
Route::get('/cars/{id}', 'CarController@show');
Route::get('/cars/{id}/edit', 'CarController@edit')->middleware('admin');
Route::put('/cars/{id}', 'CarController@update')->middleware('admin');
Route::delete('/cars/{id}', 'CarController@destroy')->middleware('admin');
