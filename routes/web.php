<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SquadController;
use App\Http\Controllers\SwimmerController;
use Illuminate\Support\Facades\Route;

// Guest routes
Route::view('/', 'index');
Route::view('/timetable', 'timetable');
Route::view('/membership', 'membership');
Route::view('/about', 'about');
Route::view('/contact', 'contact');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'showRegisterForm'])->name('show.register');
    Route::post('/register', [RegisteredUserController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Club official full access
Route::middleware(['auth', 'role:club_official'])->group(function () {
    Route::resource('swimmers', SwimmerController::class)->except(['index', 'show']);
    Route::resource('squads', SquadController::class)->except(['index', 'show']);
    Route::resource('coaches', CoachController::class);
    Route::resource('events', EventController::class)->except(['index', 'show']);
    Route::delete('/squads/{squad}/swimmers/{user}', [SquadController::class, 'removeSwimmer'])
        ->name('squads.removeSwimmer');
});

// General read access
Route::middleware('auth')->group(function () {
    Route::get('/swimmers', [SwimmerController::class, 'index'])->name('swimmers.index');
    Route::get('/swimmers/{swimmer}', [SwimmerController::class, 'show'])->name('swimmers.show');

    Route::get('/squads', [SquadController::class, 'index'])->name('squads.index');
    Route::get('/squads/{squad}/edit', [SquadController::class, 'edit'])
        ->name('squads.edit')
        ->middleware(['auth', 'role:club_official,coach']);
    Route::delete('/squads/{squad}/swimmers/{user}', [SquadController::class, 'removeSwimmer'])
        ->name('squads.removeSwimmer')->middleware(['auth', 'role:coach']);



    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
});
