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

Auth::routes();

Route::get('/article/create', [\App\Http\Controllers\ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::get('/', [\App\Http\Controllers\ArticleController::class, 'index'])->name('article');
Route::get('/article/{article}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');
Route::get('/article/edit/{article}', [\App\Http\Controllers\ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');

Route::post('/article/store', [\App\Http\Controllers\ArticleController::class, 'store'])->name('article.store')->middleware('auth');
Route::put('/article/update/{article}', [\App\Http\Controllers\ArticleController::class, 'update'])->name('article.update')->middleware('auth');
