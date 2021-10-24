<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LetterController;
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


Route::get('/', [LetterController::class, 'index']);
Route::post('/addArsip/create', [LetterController::class, 'create']);
Route::get('/delete/{id}', [LetterController::class, 'delete']);
Route::get('/delete/konfirmasi/{id}', [LetterController::class, 'confirm']);
Route::get('/arsipView/{id}', [LetterController::class, 'show']);
Route::get('/download/{id}', [LetterController::class, 'download']);
Route::get('/arsipView/download/{id}', [LetterController::class, 'download']);
Route::get('/addArsip', [CategoryController::class, 'index']);
Route::get('about', function () {
    return view('layouts.about');
});

