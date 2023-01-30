<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenulisController;
use Illuminate\Support\Facades\Auth;
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


Route::resource('jenis', KategoriController::class);
Route::resource('penulis', PenulisController::class);
Route::resource('/', BerandaController::class);
Route::resource('cerita', CeritaController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
