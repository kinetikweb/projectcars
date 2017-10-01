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
