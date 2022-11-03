<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\PortfolioPageController;
use App\Http\Controllers\ServicePageController;
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


Route::prefix('admin')->group(function () {

    // Admin dashbord pafe
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('admin.dashboard');

    // main page route
    Route::get('/main', [MainPageController::class, 'mainpage'])->name('admin.mainpage');
    Route::put('/main', [MainPageController::class, 'update'])->name('admin.mainpage.update');

    //Service page route
    Route::get('/service/create', [ServicePageController::class, 'create'])->name('admin.servicepage.create');
    Route::post('/service/create', [ServicePageController::class, 'store'])->name('admin.servicepage.store');
    Route::get('/service/list', [ServicePageController::class, 'list'])->name('admin.servicepage.list');
    Route::get('/service/edit/{id}', [ServicePageController::class, 'edit'])->name('admin.servicepage.edit');
    Route::put('/service/update/{id}', [ServicePageController::class, 'update'])->name('admin.servicepage.update');
    Route::delete('/service/delete/{id}', [ServicePageController::class, 'delete'])->name('admin.servicepage.delete');

    //Portfolio page route
    Route::get('/portfolio/create', [PortfolioPageController::class, 'create'])->name('admin.portfoliopage.create');
    Route::post('/portfolio/create', [PortfolioPageController::class, 'store'])->name('admin.portfoliopage.store');
    Route::get('/portfolio/list', [PortfolioPageController::class, 'list'])->name('admin.portfoliopage.list');
    Route::get('/portfolio/edit/{id}', [PortfolioPageController::class, 'edit'])->name('admin.portfoliopage.edit');
    Route::put('/portfolio/update/{id}', [PortfolioPageController::class, 'update'])->name('admin.portfoliopage.update');
    Route::delete('/portfolio/delete/{id}', [PortfolioPageController::class, 'delete'])->name('admin.portfoliopage.delete');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
