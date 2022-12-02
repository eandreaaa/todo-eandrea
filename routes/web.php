<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\isGuest;

Route::middleware('isGuest')->group(function(){
    Route::get('/', [TodoController::class, 'index']);
    Route::get('/login', [TodoController::class, 'login']);
    Route::post('/login/auth', [TodoController::class, 'auth'])->name('login.auth');
    Route::get('/register', [TodoController::class, 'register']);
    Route::post('/register', [TodoController::class, 'registerAccount'])->name('register.input');
});
    
Route::middleware('isLogin')->prefix('/todo')->name('todo.')->group(function () {
    Route::get('/', [TodoController::class, 'todo'])->name('index');
    Route::get('/create', [TodoController::class, 'create'])->name('create.input');
    Route::post('/store', [TodoController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [TodoController::class, 'destroy'])->name('delete');
    Route::patch('/completed/{id}', [TodoController::class, 'updateCompleted'])->name('update-completed');
});

    Route::get('/logout', [TodoController::class, 'logout'])->name('logout');