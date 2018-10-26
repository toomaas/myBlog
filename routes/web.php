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
Route::get('/notes/','NotesController@index');
Route::post('/notes/','NotesController@add');

Route::get('/events/','EventsController@index');
Route::post('/events/','EventsController@add');
Route::get('/events/{id}','EventsController@showDetails');
Route::post('/events/attend','EventsController@registUserEvent');
