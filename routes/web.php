<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\ComplainsController;
use Illuminate\Support\Facades\Route;

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

Route::any('/categories', [CategoryController::class, 'show']);
Route::get('/songs', [SongsController::class, 'show']);
Route::any('/upload', [CategoryController::class, 'upload']);
Route::any('/complains/{id}', [ComplainsController::class, 'send']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
