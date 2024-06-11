<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
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
    Route::delete('/user/{id}/delete', [UserController::class, 'userDelete'])->middleware(['auth', 'verified'])->name('user.delete');
}

// Subjects related routes
{
        Route::get('/subject', [SubjectController::class, 'index'])->middleware(['auth', 'verified'])->name('subject.index');
        Route::post('/subject/add', [SubjectController::class, 'subjectAdd'])->middleware(['auth', 'verified'])->name('subject.add');
        Route::put('/subject/{id}/update', [SubjectController::class, 'subjectUpdate'])->middleware(['auth', 'verified'])->name('subject.update');
        Route::delete('/subject/{id}/delete', [SubjectController::class, 'subjectDelete'])->middleware(['auth', 'verified'])->name('subject.delete');
    
}

// Classsroom related routes
{
    Route::get('/classroom', [ClassroomController::class, 'index'])->middleware(['auth', 'verified'])->name('classroom.index');
    Route::post('/classroom/add', [ClassroomController::class, 'classroomAdd'])->middleware(['auth', 'verified'])->name('classroom.add');
    Route::put('/classroom/{id}/update', [ClassroomController::class, 'classroomUpdate'])->middleware(['auth', 'verified'])->name('classroom.update');
    Route::delete('/classroom/{id}/delete', [ClassroomController::class, 'classroomDelete'])->middleware(['auth', 'verified'])->name('classroom.delete');

}

// Course related routes
{
    Route::get('/course', [CourseController::class, 'index'])->middleware(['auth', 'verified'])->name('course.index');
    Route::post('/course/add', [CourseController::class, 'courseAdd'])->middleware(['auth', 'verified'])->name('course.add');
    Route::put('/course/{id}/update', [CourseController::class, 'courseUpdate'])->middleware(['auth', 'verified'])->name('course.update');
    Route::delete('/course/{id}/delete', [CourseController::class, 'courseDelete'])->middleware(['auth', 'verified'])->name('course.delete');

}

// Batch related routes
{
    Route::get('/batch', [BatchController::class, 'index'])->middleware(['auth', 'verified'])->name('batch.index');
    Route::post('/batch/add', [BatchController::class, 'batchAdd'])->middleware(['auth', 'verified'])->name('batch.add');
    Route::put('/batch/{id}/update', [BatchController::class, 'batchUpdate'])->middleware(['auth', 'verified'])->name('batch.update');
    Route::delete('/batch/{id}/delete', [BatchController::class, 'batchDelete'])->middleware(['auth', 'verified'])->name('batch.delete');

}

require __DIR__ . '/auth.php';
