<?php
use App\Http\Controllers\UserRegisterController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::post('/register', [UserRegisterController::class, 'register']);