<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('home');
//});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
Route::post('/post/create', [PostController::class, 'store'])->name('posts.store');
