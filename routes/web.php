<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainPageController;
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


Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/admin/dashboard', [PagesController::class,'dashboard'])->name('admin.dashboard');


// main page route
Route::get('/admin/main', [MainPageController::class,'mainpage'])->name('admin.mainpage');
Route::put('/admin/main', [MainPageController::class,'update'])->name('admin.mainpage.update');


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');