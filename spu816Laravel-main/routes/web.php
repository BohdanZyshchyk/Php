<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [MainController::class, 'Index']);
Route::get('/ShowPost/{id}',[\App\Http\Controllers\MainController::class,'ShowPost']);
Route::get('/AddPost',[\App\Http\Controllers\MainController::class,'AddPost'])->middleware('auth');
Route::post('/posts/upload', [\App\Http\Controllers\MainController::class, 'UploadImage']);

Route::get('/register', [RegisterController::class,'create']);
Route::post('/register', [RegisterController::class,'store']);

Route::get('/login', [LoginController::class,'create'])->name('login');
Route::post('/login', [LoginController::class,'store']);

Route::get('/logout', [LoginController::class,'destroy']);
