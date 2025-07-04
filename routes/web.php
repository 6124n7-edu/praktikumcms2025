<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- Publicly Accessible Routes ---

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Show the list of all posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Show a single post
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');


// --- Guest & Authentication Routes ---

// Show login form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
// Handle login submission
Route::post('/login', [AuthController::class, 'login']);


// --- Protected Routes (Require User to be Logged In) ---

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function() {
        return view('dashboard'); // This loads your Blade file
    })->name('dashboard');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // --- Post Management ---
    // Show form to create a new post
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    // Store the new post
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    // Show form to edit a post
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    // Update the post
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    // Show delete confirmation page
    Route::get('/posts/{id}/delete', [PostController::class, 'delete'])->name('posts.delete');
    // Delete the post
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


    // --- Image Management ---
    // Show the upload form
    Route::get('/upload', [ImageController::class, 'create'])->name('image.create');
    // Store the uploaded image
    Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
    // Show the image gallery
    Route::get('/images', [ImageController::class, 'index'])->name('image.index');
    // Delete an image
    Route::delete('/images/{image}', [ImageController::class, 'destroy'])->name('image.destroy');
});