<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;



Route::get('/', [EventController::class, 'index'])->name('home');


Route::get(
    '/events',
    [EventController::class, 'index']
)->name('events.index');


Route::get(
    '/events/create',
    [EventController::class, 'create']
)
->middleware(['auth', 'admin'])
->name('events.create');


Route::post(
    '/events',
    [EventController::class, 'store']
)
->middleware(['auth', 'admin'])
->name('events.store');


Route::get(
    '/events/{event}',
    [EventController::class, 'show']
)->name('events.show');


Route::get(
    '/events/{event}/edit',
    [EventController::class, 'edit']
)
->middleware(['auth', 'admin'])
->name('events.edit');


Route::put(
    '/events/{event}',
    [EventController::class, 'update']
)
->middleware(['auth', 'admin'])
->name('events.update');


Route::delete(
    '/events/{event}',
    [EventController::class, 'destroy']
)
->middleware(['auth', 'admin'])
->name('events.destroy');


Route::middleware(['auth'])->group(function () {

    Route::post(
        '/register-event/{id}',
        [RegistrationController::class, 'register']
    )->name('events.register');


    Route::get(
        '/my-registrations',
        [RegistrationController::class, 'myRegistrations']
    )->name('my.registrations');


    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');


    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');


    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

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