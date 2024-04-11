<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [\App\Http\Controllers\TodoController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/create', [\App\Http\Controllers\TodoController::class, 'create'])->middleware(['auth', 'verified'])->name('todo.create');
Route::get('/show/{id}', [\App\Http\Controllers\TodoController::class, 'show'])->middleware(['auth', 'verified'])->name('todo.show');
Route::post('/create', [\App\Http\Controllers\TodoController::class, 'store'])->middleware(['auth', 'verified'])->name('todo.store');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('/todos/{id}/completed', [\App\Http\Controllers\TodoController::class, 'completed_check'])->name('todos.completed');
Route::post('/todos/{id}/uncomplete', [\App\Http\Controllers\TodoController::class, 'uncomplete_check'])->name('todos.uncomplete');

Route::post('/todos/{id}/uncomplete_dash', [\App\Http\Controllers\TodoController::class, 'uncomplete_check_dash'])
    ->name('todos.uncomplete_dash');
Route::post('/todos/{id}/completed_dash', [\App\Http\Controllers\TodoController::class, 'completed_check_dash'])
    ->name('todos.completed_dash');
require __DIR__ . '/auth.php';
