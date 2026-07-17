<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BoatController;
use App\Http\Controllers\Admin\IslandController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ReviewController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/destinasi', [HomeController::class, 'destinations'])
    ->name('front.destinations');

Route::get('/destinasi/{destination}', [HomeController::class, 'show'])
    ->name('front.destinations.show');

Route::get('/kelotok', [HomeController::class, 'boats'])
    ->name('front.boats');

Route::get('/peta', [HomeController::class, 'map'])
    ->name('front.map');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::get('/destinations/export/pdf', [DestinationController::class, 'exportPdf'])
            ->name('destinations.export.pdf');

        Route::get('/destinations/export/excel', [DestinationController::class, 'exportExcel'])
            ->name('destinations.export.excel');

        Route::resources([
            'destinations' => DestinationController::class,
            'categories' => CategoryController::class,
            'boats' => BoatController::class,
            'islands' => IslandController::class,
            'galleries' => GalleryController::class,
            'reviews' => ReviewController::class,
        ]);
    });