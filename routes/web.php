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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/events', 'EventsController@index')->name('event.index')->middleware('auth');
Route::post('/events', 'EventsController@store')->name('event.store')->middleware('auth');
Route::delete('/events/destroy/{event}', 'EventsController@destroy')->name('event.destroy');

Route::get('/events/{event}', 'EventsController@show')->name('event.show')->middleware('auth');
Route::patch('/events/update/{event}', 'EventsController@update')->name('event.update')->middleware('auth');

