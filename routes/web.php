<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\ItemController@index');
Route::get('/item/{id}', 'App\Http\Controllers\ItemController@show')->name('show');
Route::get('/create', 'App\Http\Controllers\ItemController@create')->name('create');
Route::post('/store', 'App\Http\Controllers\ItemController@store')->name('store');