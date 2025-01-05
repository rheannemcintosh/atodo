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

Route::get('to-do-list/create', [ToDoListController::class, 'create'])->name('to-do-list.create');
Route::post('to-do-list/store', [ToDoListController::class, 'store'])->name('to-do-list.store');
Route::get('to-do-list', [ToDoListController::class, 'index'])->name('to-do-list.index');
Route::get('to-do-list/{toDoList}/edit', [ToDoListController::class, 'edit'])->name('to-do-list.edit');
Route::put('to-do-list/{toDoList}', [ToDoListController::class, 'update'])->name('to-do-list.update');
Route::delete('to-do-list/{toDoList}', [ToDoListController::class, 'destroy'])->name('to-do-list.destroy');

Route::resource('task-details', TaskDetailController::class);
require __DIR__.'/auth.php';
