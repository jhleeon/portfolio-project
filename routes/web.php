<?php

use App\Http\Controllers\AboutPageController;
use App\Http\Controllers\ContactFormController;
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
Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');


Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Admin dashbord page
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

    //About page route
    Route::get('/about/create', [AboutPageController::class, 'create'])->name('admin.aboutpage.create');
    Route::post('/about/create', [AboutPageController::class, 'store'])->name('admin.aboutpage.store');
    Route::get('/about/list', [AboutPageController::class, 'list'])->name('admin.aboutpage.list');
    Route::get('/about/edit/{id}', [AboutPageController::class, 'edit'])->name('admin.aboutpage.edit');
    Route::put('/about/update/{id}', [AboutPageController::class, 'update'])->name('admin.aboutpage.update');
    Route::delete('/about/delete/{id}', [AboutPageController::class, 'delete'])->name('admin.aboutpage.delete');
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
