<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToDoListController;
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

Route::resource('categories', CategoryController::class);

Route::get('to-do-list/{year}-{month}-{day}', [ToDoListController::class, 'show'])
    ->where([
        'year' => '\d{4}', // Ensures year is a 4-digit number
        'month' => '\d{2}', // Ensures month is a 2-digit number
        'day' => '\d{2}', // Ensures day is a 2-digit number
    ])
    ->name('to-do-list.show');

require __DIR__.'/auth.php';
