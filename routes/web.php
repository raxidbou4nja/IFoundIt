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
Route::get('/search', 'App\Http\Controllers\ItemController@search')->name('search');
Route::get('/create', 'App\Http\Controllers\ItemController@create')->name('create');
Route::post('/store', 'App\Http\Controllers\ItemController@store')->name('store');
Route::get('/contact/{id}', 'App\Http\Controllers\ContactController@show')->name('contact');
Route::post('/send_request/{id}', 'App\Http\Controllers\ContactController@sendRequest')->name('sendRequest');
Route::get('/chat_with_finder/{reference}', 'App\Http\Controllers\ChatController@show')->name('indexChatWithFinder');
Route::post('/chat_message_to_finder/{reference}', 'App\Http\Controllers\ChatController@sendToFinder')->name('sendToFinder');
Route::get('/chat_with_owner/{reference}', 'App\Http\Controllers\ChatController@showOwnerContact')->name('indexChatWithOwner');
Route::get('/chat_with_owner/{reference}/{request_id}', 'App\Http\Controllers\ChatController@showOwnerContactMessages')->name('showOwnerContactMessages');