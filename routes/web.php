<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\InstructorController;
use Illuminate\Support\Facades\Route;


//Aluno
Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');
Route::put('/users/{id}', [UserController::class,'update'])->name('users.update');
Route::get('/users/{id}/edit', [UserController::class,'edit'])->name('users.edit');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

//Instructors
Route::delete('/instructors/{id}', [InstructorController::class, 'delete'])->name('instructors.delete');
Route::put('/instructors/{id}', [InstructorController::class,'update'])->name('instructors.update');
Route::get('/instructors/{id}/edit', [InstructorController::class,'edit'])->name('instructors.edit');
Route::get('/instructors', [InstructorController::class, 'index'])->name('instructors.index');
Route::get('/instructors/create', [InstructorController::class, 'create'])->name('instructors.create');
Route::post('/instructors', [InstructorController::class, 'store'])->name('instructors.store');
Route::get('/instructors/{id}', [InstructorController::class, 'show'])->name('instructors.show');


Route::get('/', function () {
    return view('welcome');
});
