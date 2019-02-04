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

Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home',                 'HomeController@index')->name('home');
Route::get('/home/create',          'HomeController@createLog')->name('createLog');
Route::post('/home/create/save',    'HomeController@saveCreateLog')->name('saveLog');
Route::get('/home/{uuid}',          'HomeController@viewCommunicationLog')->name('viewLog');
Route::get('/home/{uuid}/edit',     'HomeController@editCommunicationLog')->name('editLog');
Route::post('/home/{uuid}/save',    'HomeController@saveCommunicationLog')->name('saveEditLog');