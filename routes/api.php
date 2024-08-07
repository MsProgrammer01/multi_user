<?php
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function (){
 
   

});






Route::post('/register', [UserRegisterController::class, 'register']);