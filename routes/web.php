<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

    require __DIR__ . '/auth.php';



Route::middleware(['auth','verified'])->group(function () {
    Route::resource('todo', TodoController::class)->except(['show']);


Route::patch('/todo/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');
 Route::patch('/todo/{todo}/uncomplete', [TodoController::class, 'uncomplete'])->name('todo.uncomplete');
 
 Route::get('/todo/{todo}/edit', [TodoController::class, 'edit'])->name('todo.edit');
 Route::patch('/todo/{todo}', [TodoController::class, 'update'])->name('todo.update');
 
 Route::delete('/todo/{todo}', [TodoController::class, 'destroy'])->name('todo.destroy');
 Route::delete('/todo', [TodoController::class, 'destroyCompleted'])->name('todo.deleteallcompleted');
 
 Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
 Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
 Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

         Route::resource('category', CategoryController::class)->except(['show']);


});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('user', UserController::class)->except(['show']);
    Route::patch('/user/{user}/makeadmin', [UserController::class, 'makeadmin'])->name('user.makeadmin');
    Route::patch('/user/{user}/removeadmin', [UserController::class, 'removeadmin'])->name('user.removeadmin');
});

Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::patch('/user/{user}/makeadmin', [UserController::class, 'makeadmin'])->name('user.makeadmin');
 Route::patch('/user/{user}/removeadmin', [UserController::class, 'removeadmin'])->name('user.removeadmin');
 
 Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
 
 
 
require __DIR__.'/auth.php';