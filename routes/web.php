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

Route::prefix('home')->group( function () {
    Route::get('/', 'HomeController@index')->name('home');
});

Route::prefix('game')->group( function () {
    Route::get('/', 'GameAppController@index')->name('game');
    Route::get('/create', 'GameAppController@create')->name('game_create');
    Route::get('/select/{id}', 'GameAppController@select')->where("id", "\w+")->name('game_select');
    Route::get('/update/{id}', 'GameAppController@update')->where("id", "\w+")->name('game_update');
    Route::get('/delete/{id}', 'GameAppController@delete')->where("id", "\w+")->name('game_delete');
    Route::post('/dealwith', 'GameAppController@dealwith')->name('game_dealwith');
} );
