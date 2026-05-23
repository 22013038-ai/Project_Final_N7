<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;

Route::get('/', [EventController::class, 'index'])->name('home');
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

Route::middleware(['auth'])->group(function () {

    Route::post(
        '/register-event/{id}',
        [RegistrationController::class, 'register']
    )->name('events.register');
    Route::get(
        '/my-registrations',
        [RegistrationController::class, 'myRegistrations']
    )->name('my.registrations');

});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');
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
    )->name('registrations.index');

    Route::post(
        '/registrations/{id}/approve',
        [RegistrationController::class, 'approve']
    )->name('registrations.approve');

    Route::post(
        '/registrations/{id}/cancel',
        [RegistrationController::class, 'cancel']
    )->name('registrations.cancel');

});

require __DIR__.'/auth.php';