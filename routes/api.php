<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
/*
Route::post('/login', [LoginController::class, 'login'])->name('api.loginp');
Route::post('/logout', [LoginController::class, 'logout'])->name('api.logout');
Route::post('/users', [UserController::class, 'createUser']);
*/
Route::post('/store', [EmployeeController::class, 'store'])->name('store');