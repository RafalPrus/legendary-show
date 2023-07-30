<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserArticleController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::get('articles/{article}', [ArticleController::class, 'show']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('users/{user}/edit', [UserController::class, 'edit'])->middleware(['auth']);
Route::patch('users/{user}', [UserController::class, 'update'])->middleware('auth');

// User
Route::post('articles/{article}/comment', [ArticleCommentController::class, 'store'])->middleware('auth');

Route::get('users/articles/{user}/index', [UserArticleController::class, 'index'])->middleware('auth');
Route::post('users/articles/{user}/store/{article}', [UserArticleController::class, 'store'])->middleware('auth');
Route::delete('users/articles/{user}/delete/{article}', [UserArticleController::class, 'destroy'])->middleware('auth');

// Admin
Route::get('admin/articles', [AdminController::class, 'index'])->middleware('admin');
Route::get('admin/articles/create', [AdminController::class, 'create'])->middleware('admin');
Route::get('admin/articles/{article}/edit', [AdminController::class, 'edit'])->middleware('admin');
Route::post('admin/articles/store', [AdminController::class, 'store'])->middleware('admin');
Route::patch('admin/articles/{article}/update', [AdminController::class, 'update'])->middleware('admin');
Route::delete('admin/articles/{article}/delete', [AdminController::class, 'destroy'])->middleware('admin'); // test


