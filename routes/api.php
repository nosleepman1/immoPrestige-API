<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Auth
Route::post('/auth/register', [UserController::class, 'register']);
Route::get('test', function () {
    return 'test';
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
