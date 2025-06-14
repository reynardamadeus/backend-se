<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaterialController;
use App\Http\Middleware\IsLogin;

Route::get('/lesson', function(){
    return view('lesson');
});
Route::get('/forgot-password-web', function(){
    return view('resetpasswordweb');
});



Route::controller(UserController::class)->group( function() {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::post('/forgot-password', 'forgotPassword');
    Route::middleware(IsLogin::class)->get('/user-profile', 'getUserProfile')->name('user.profile');
    Route::middleware(IsLogin::class)->put('/user-profile-edit', 'updateProfile')->name('user.update');
    Route::post('/reset-password/{token}', 'resetPassword');
    Route::middleware(IsLogin::class)->post('/logout', 'logout')->name('logout');
});

Route::controller(MaterialController::class)->group( function() {
    Route::get('/', 'get')->name('homepage');
    // Route::middleware('auth:sanctum', isAdmin::class)->group( function(){
    Route::post('/material/create', 'create')->name('material.create');
    Route::put('/material/edit/{id}', 'update');
    Route::delete('/material/delete/{id}', 'delete');
    // });
});