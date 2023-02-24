<?php

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

Route::resource('clothe', App\Http\Controllers\ClotheController::class);
Route::get('/', [App\Http\Controllers\ClotheController::class, 'index'])->name('clothe.index');
Route::post('fetchdata', [App\Http\Controllers\ClotheController::class, 'fetchData'])->name('clothe.fetchData');