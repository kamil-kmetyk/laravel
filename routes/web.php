<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Authorisation
Route::get('/', [ AuthController::class, 'login' ])->name('login');
Route::post('/', [ AuthController::class, 'loginSubmit' ])->name('login.post');
Route::get('/registration', [ AuthController::class, 'registration' ])->name('registration');
Route::post('/registration', [ AuthController::class, 'registrationSubmit' ])->name('registration.post');
