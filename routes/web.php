<?php

use App\Http\Controllers\ExerciseMaterialController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LessonMaterialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PasswordController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\IsLogin;

Route::get('/lesson', function(){
    return view('lesson');
});

Route::controller(UserController::class)->group( function() {
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
    Route::middleware(IsLogin::class)->get('/user-profile', 'getUserProfile')->name('user.profile');
    Route::middleware(IsLogin::class)->put('/user-profile-edit', 'updateProfile')->name('user.update');
    Route::middleware(IsLogin::class)->post('/logout', 'logout')->name('logout');
});
Route::controller(PasswordController::class)->group( function() {
    Route::get('/forgot-password-form', 'getForgotPasswordRequest')->name('forgotpassword.request.get');
    Route::post('/forgot-password', 'forgotPassword')->name('forgot.password.request');
    Route::get('/reset-password', 'resetPassword')->name('reset.password.link.view');
    Route::post('/reset-password-form', 'submitResetPassword')->name('password.reset');
});

Route::controller(MaterialController::class)->group( function() {
    Route::get('/', 'materialHomepage')->name('homepage');
    Route::get('/exercise-materials', 'exerciseHomepage')->name('exercise.homepage');
    // Route::middleware('auth:sanctum', isAdmin::class)->group( function(){
    Route::post('/filter-material', 'filter')->name('material.filter');
    Route::post('/filter-exercise', 'filterFromExercise')->name('exercise.material.filter');

    Route::middleware(isAdmin::class)->post('/material/create', 'create')->name('material.create');
    Route::put('/material/edit/{id}', 'update');
    Route::middleware(isAdmin::class)->delete('/material/delete/{id}', 'delete');
    // });
});

Route::controller(LessonMaterialController::class)->group( function() {
    Route::get('/lessons/{id}', 'get')->name('lesson.get');
    Route::post('/search-lesson', 'searchLesson')->name('lesson.search');
    Route::middleware(isAdmin::class)->post('/lessons/subject/{id}', 'createSubject')->name('lesson.subject.create');
    Route::middleware(isAdmin::class)->get('/create-lesson/{id}', 'getInsertContentForm')->name('lesson.content.form');
    Route::middleware(isAdmin::class)->post('/insert-content/{id}', 'insertContentForm')->name('lesson.content.create');
});

Route::post('/quill-image-upload', [ImageController::class, 'upload'])->name('quill.image.upload');

Route::controller(ExerciseMaterialController::class)->group( function () {
    Route::get('/exercises/{id}', 'get')->name('exercise.get');
    Route::post('/search-exercise', 'searchExercise')->name('exercise.search');
    Route::middleware(isAdmin::class)->post('/exercise/subject/{id}', 'createSubject')->name('exercise.subject.create');
    Route::middleware(isAdmin::class)->get('/create-exercise/{id}', 'getInsertContentForm')->name('exercise.content.form');
    Route::middleware(isAdmin::class)->post('/insert-exercise/{id}', 'insertContentForm')->name('exercise.content.create');
});
