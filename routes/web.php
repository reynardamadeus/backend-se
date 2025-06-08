<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaterialController;

Route::get('/lesson', function(){
    return view('lesson');
});
Route::get('/forgot-password-web', function(){
    return view('resetpasswordweb');
});

Route::get('/user-profile', function(){
    return view('profile');
});

Route::controller(UserController::class)->group( function() {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/forgot-password', 'forgotPassword');
    Route::post('/reset-password/{token}', 'resetPassword');
    Route::middleware('auth:sanctum')->post('/logout', 'logout');
});

Route::controller(MaterialController::class)->group( function() {
    Route::get('/', 'get')->name('homepage');
    // Route::middleware('auth:sanctum', isAdmin::class)->group( function(){
    Route::post('/material/create', 'create')->name('material.create');
    Route::put('/material/edit/{id}', 'update');
    Route::delete('/material/delete/{id}', 'delete');
    // });
});