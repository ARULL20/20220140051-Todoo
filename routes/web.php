<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;



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

route::get('/todo',[TodoController::class,'view'])->name('todo.view');
route::get('/todo/create',[TodoController::class,'create'])->name('todo.create');
route::get('/todo/edit',[TodoController::class,'edit'])->name('todo.edit');


route::get('/user',[UserController::class,'view'])->name('user.index');


require __DIR__.'/auth.php';
