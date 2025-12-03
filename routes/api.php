<?php

use App\Http\Controllers\AnounceController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Auth
Route::post('/auth/register', [UserController::class, 'register']);

Route::post('/anounce/new', [AnounceController::class, 'store']);
Route::get('/anounces', [AnounceController::class, 'index']);

Route::get('test', function () {
    return 'test';
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
