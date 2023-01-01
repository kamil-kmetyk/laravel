<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

// Authorisation
Route::get('/', [ AuthController::class, 'login' ])->name('login');
Route::post('/', [ AuthController::class, 'loginSubmit' ])->name('login.post');
Route::get('/registration', [ AuthController::class, 'registration' ])->name('registration');
Route::post('/registration', [ AuthController::class, 'registrationSubmit' ])->name('registration.post');

// Authorised access
Route::middleware(['auth'])->group(function () {
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Authorised and secured access
Route::middleware(['auth', 'can:is-root,is-admin,is-mod'])->group(function () {
  Route::get('/dashboard', [ DashboardController::class, 'index'])->name('dashboard');

  Route::get('/account', [ AccountController::class, 'index'])->name('account');
  Route::patch('/account', [ AccountController::class, 'edit'])->name('account.edit');

  Route::get('/settings', [ SettingsController::class, 'index'])->name('settings');
  Route::patch('/settings', [ SettingsController::class, 'save'])->name('settings.patch');
});
