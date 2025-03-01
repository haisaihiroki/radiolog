<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeDigitalController;
use App\Http\Controllers\SummaryController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/home',                 [HomeController::class, 'index'])->name('home');
Route::post('/home/create/save',    [HomeController::class, 'saveCreateLog'])->name('saveLog');
Route::get('/home/{uuid}',          [HomeController::class, 'viewCommunicationLog'])->name('viewLog');
Route::get('/home/{uuid}/edit',     [HomeController::class, 'editCommunicationLog'])->name('editLog');
Route::post('/home/{uuid}/save',    [HomeController::class, 'saveCommunicationLog'])->name('saveEditLog');
Route::delete('/home/{uuid}/delete', [HomeController::class,'deleteCommunicationLog'])->name('deleteLog');
Route::get('/digital/home',                 [HomeDigitalController::class, 'index'])->name('home-digital');
Route::post('/digital/home/create/save',    [HomeDigitalController::class, 'saveCreateLog'])->name('saveLog-digital');
Route::get('/digital/home/{uuid}',          [HomeDigitalController::class, 'viewCommunicationLog'])->name('viewLog-digital');
Route::get('/digital/home/{uuid}/edit',     [HomeDigitalController::class, 'editCommunicationLog'])->name('editLog-digital');
Route::post('/digital/home/{uuid}/save',    [HomeDigitalController::class, 'saveCommunicationLog'])->name('saveEditLog-digital');
Route::get('/summary',              [SummaryController::class, 'index'])->name('summary');