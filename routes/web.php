<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Users related routes
{
    Route::get('/user', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('user.index');
    Route::get('/user/{id}', [UserController::class, 'userDetail'])->middleware(['auth', 'verified'])->name('user.details');
    Route::put('/user/{id}/update', [UserController::class, 'userUpdate'])->middleware(['auth', 'verified'])->name('user.update');
    Route::delete('/user/{id}/update', [UserController::class, 'userDelete'])->middleware(['auth', 'verified'])->name('user.delete');
}

// Subjects related routes
{
    Route::get('/subject', function(){return view('admin.subject');})->middleware(['auth', 'verified'])->name('subject.index');
}

// Users related routes
{
    Route::get('/classroom', function(){return view('admin.classroom');})->middleware(['auth', 'verified'])->name('classroom.index');
}



require __DIR__ . '/auth.php';
