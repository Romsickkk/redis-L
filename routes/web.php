<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show']);