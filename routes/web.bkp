<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StaticPageController::class, 'root']);

Route::get('/principal', [StaticPageController::class, 'home'])->name('home');

Route::get('/about', [StaticPageController::class, 'about'])->name('about');

Route::get('/contactactanos', [StaticPageController::class, 'contact'])->name('contact');

//Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');

Route::resource('/tasks', TaskController::class);
