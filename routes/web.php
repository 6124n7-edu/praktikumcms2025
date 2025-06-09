<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// Group routes menggunakan role 'author' atau 'admin'
Route::middleware(['auth', 'check.role:admin,author'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/draft', [PostController::class, 'storeDraft'])->name('posts.storeDraft');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/posts/{id}/delete', [PostController::class, 'delete'])->name('posts.delete');
});

// Contoh route untuk 'admin'
Route::middleware(['auth', 'check.role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return "Welcome, Admin!";
    })->name('admin.dashboard');
});

//on hold:
//Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
//Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
//Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
//Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
//Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');