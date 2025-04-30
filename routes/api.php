<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(UserController::class)->group( function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/forgot-password', 'forgotPassword');
    Route::post('/reset-password/{token}', 'resetPassword');
    Route::middleware('auth:sanctum')->post('/logout', 'logout');
});

    Route::controller(MaterialController::class)->group( function() {
        Route::get('/material/', 'get');
        Route::middleware('auth:sanctum', isAdmin::class)->group( function(){
        Route::post('/material/create', 'create');
        Route::put('/material/edit/{id}', 'update');
        Route::delete('/material/delete/{id}', 'delete');
        });
    });

    




