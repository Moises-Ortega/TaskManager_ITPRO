<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->route('home');
});

Route::get('/principal', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::get('/contactactanos', function(){
    return view('contacto');
})->name('contact');

Route::get('/tasks', [TaskController::class, 'index']);