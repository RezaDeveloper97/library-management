<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ReserveBookController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')
    ->controller(UserAuthController::class)
    ->group(function () {
        Route::post('register', 'register')->name('register');
        Route::post('login', 'login')->name('login');
        Route::post('logout', 'logout')->name('logout')->middleware('auth:sanctum');
    });

Route::middleware('auth:sanctum')
    ->group(function () {
        Route::prefix('location')
            ->group(function () {
                Route::get('provinces', [LocationController::class, 'listOfProvince'])->name('location.province.list');
                Route::get('cities', [LocationController::class, 'listOfCity'])->name('location.city.list');
            });

        Route::prefix('book')
            ->group(function () {
                Route::get('stock/list', [BookController::class, 'listOfBookInStock'])->name('book.stock.list');

                Route::post('reserve', [ReserveBookController::class, 'newReserveBook'])->name('book.reserve.new');
            });
    });
