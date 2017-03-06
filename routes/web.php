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
Route::post('/queue/process', ['middleware' => 'auth', 'uses' => 'QueueController@setNextJobToProcess']);
Route::get('/queue/time', ['middleware' => 'auth', 'uses' => 'QueueController@aveTime']);
Route::get('/queue/status/{id}', ['middleware' => 'auth', 'uses' => 'QueueController@status']);

Route::post('/queue/create', ['middleware' => 'auth', 'uses' => 'QueueController@create']);
Route::put('/queue/{id}', ['middleware' => 'auth', 'uses' => 'QueueController@update']);

Auth::routes();

Route::get('/home', 'HomeController@index');
