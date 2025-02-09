<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskDetailController;
use App\Http\Controllers\ToDoListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class);

    Route::get('to-do-list/{type}/{slug}',  [ToDoListController::class, 'show'])
        ->where([
            'type' => 'daily|weekly|monthly',
        ])
        ->name('to-do-list.show');

    Route::get('to-do-list/create', [ToDoListController::class, 'create'])->name('to-do-list.create');
    Route::post('to-do-list/store', [ToDoListController::class, 'store'])->name('to-do-list.store');
    Route::get('to-do-list', [ToDoListController::class, 'index'])->name('to-do-list.index');
    Route::get('to-do-list/edit/{toDoList}', [ToDoListController::class, 'edit'])->name('to-do-list.edit');
    Route::put('to-do-list/{toDoList}', [ToDoListController::class, 'update'])->name('to-do-list.update');

    Route::put('to-do-list/{toDoList}/update-tasks', [ToDoListController::class, 'updateTasks'])->name('to-do-list.update-tasks');

    Route::delete('to-do-list/{toDoList}', [ToDoListController::class, 'destroy'])->name('to-do-list.destroy');

    Route::resource('task-details', TaskDetailController::class);

    Route::resource('tasks', TaskController::class);

    Route::resource('projects', ProjectController::class);

    Route::resource('tags', TagController::class);
});

require __DIR__.'/auth.php';
