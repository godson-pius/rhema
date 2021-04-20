<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::post('/contact', [ContactController::class, 'store'])->name('contact');

Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/upload', [UploadController::class, 'index'])->name('upload')->middleware(['auth']);
Route::get('/rhema/edit/{upload}', [UploadController::class, 'edit'])->name('edit');
Route::post('/upload/{upload}', [UploadController::class, 'update'])->name('update');
Route::get('/rhema/delete/{upload}', [UploadController::class, 'delete'])->name('delete');
Route::post('/upload', [UploadController::class, 'store']);

Route::get('/', [UploadController::class, 'show'])->name('main');
