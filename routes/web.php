<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;



Route::get('/',
    [EventController::class, 'index']);


Route::resource(
    'events',
    EventController::class
);

Route::post(
    '/register-event/{id}',
    [RegistrationController::class, 'register']
)->middleware('auth');

Route::middleware(['auth'])->group(function(){

    Route::resource(
        'categories',
        CategoryController::class
    );

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    );

    Route::get(
        '/my-registrations',
        [RegistrationController::class, 'myRegistrations']
    );

});

require __DIR__.'/auth.php';