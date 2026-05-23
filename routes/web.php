<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;
Route::get(
    '/',
    [EventController::class, 'index']
);
Route::get(
    '/events',
    [EventController::class, 'index']
);
Route::get(
    '/events/{event}',
    [EventController::class, 'show']
);

Route::middleware(['auth'])->group(function () {

    Route::post(
        '/register-event/{id}',
        [RegistrationController::class, 'register']
    );
    Route::get(
        '/my-registrations',
        [RegistrationController::class, 'myRegistrations']
    );

});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    );

    Route::resource(
        'categories',
        CategoryController::class
    );
    Route::resource(
        'events',
        EventController::class
    )->except([
        'index',
        'show'
    ]);

    Route::get(
        '/registrations',
        [RegistrationController::class, 'index']
    );

    Route::post(
        '/registrations/{id}/approve',
        [RegistrationController::class, 'approve']
    );

    Route::post(
        '/registrations/{id}/cancel',
        [RegistrationController::class, 'cancel']
    );

});

require __DIR__.'/auth.php';