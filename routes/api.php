<?php

use App\Http\Controllers\API\V1\AuthController;
use Illuminate\Support\Facades\Route;

// Public
Route::post('/login', [ AuthController::class, 'login' ]);
Route::post('/register', [ AuthController::class, 'register' ]);

// User endpoints.
Route::middleware([ 'auth:sanctum' ])->prefix('/user')->group(function () {

});
