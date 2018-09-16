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


Route::get('login', 'LoginController@getLogin')->name('login');
Route::post('login', 'LoginController@postLogin')->name('login.post');
Route::get('logout', 'LoginController@getLogout');

Route::middleware('auth')->group(function (){

    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});

