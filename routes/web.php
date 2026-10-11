<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Public Routes (Landing Page)
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/profil', [PublicController::class, 'profile'])->name('profile');
Route::get('/wisata', [PublicController::class, 'potentials'])->name('potentials');
Route::get('/wisata/{id}', [PublicController::class, 'potentialDetail'])->name('potential.detail');
Route::get('/fasilitas', [PublicController::class, 'facilities'])->name('facilities');
Route::get('/produk', [PublicController::class, 'products'])->name('products');
Route::get('/berita', [PublicController::class, 'posts'])->name('posts');
Route::get('/berita/{slug}', [PublicController::class, 'postDetail'])->name('post.detail');

// Admin Routes (Protected dengan Auth Middleware)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Village Profiles Management
    Route::resource('village-profiles', \App\Http\Controllers\Admin\VillageProfileController::class);

    // Officials Management
    Route::resource('officials', \App\Http\Controllers\Admin\OfficialController::class);

    // Potentials Management
    Route::resource('potentials', \App\Http\Controllers\Admin\PotentialController::class);

    // Facilities Management
    Route::resource('facilities', \App\Http\Controllers\Admin\FacilityController::class);

    // Products Management
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);

    // Posts Management
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
