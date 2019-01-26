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

Route::get('/first-test', 'TestController@showFirstTest')->name('first-test');
Route::post('/first-test', 'TestController@firstTest')->name('first-test');

Route::get('/second-test', 'TestController@showSecondTest')->name('second-test');