<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Public Routes (Landing Page)
Route::get('/', [PublicController::class, 'index'])->name('home');

// Profile Routes with sub-pages
Route::get('/profil', [PublicController::class, 'profile'])->name('profile');
Route::get('/profil/sejarah', [PublicController::class, 'profileSejarah'])->name('profile.sejarah');
Route::get('/profil/visi-misi', [PublicController::class, 'profileVisiMisi'])->name('profile.visi-misi');
Route::get('/profil/pemerintahan', [PublicController::class, 'profilePemerintahan'])->name('profile.pemerintahan');
Route::get('/profil/struktur-organisasi', [PublicController::class, 'profileStrukturOrganisasi'])->name('profile.struktur-organisasi');

// Statistics Route
Route::get('/statistik', [PublicController::class, 'statistics'])->name('statistics');

Route::get('/wisata', [PublicController::class, 'potentials'])->name('potentials');
Route::get('/wisata/{id}', [PublicController::class, 'potentialDetail'])->name('potential.detail');
Route::get('/fasilitas', [PublicController::class, 'facilities'])->name('facilities');
Route::get('/produk', [PublicController::class, 'products'])->name('products');
Route::get('/berita', [PublicController::class, 'posts'])->name('posts');
Route::get('/berita/{slug}', [PublicController::class, 'postDetail'])->name('post.detail');

// Pengajuan Surat Routes (Public)
Route::get('/pengajuan-surat', [\App\Http\Controllers\PengajuanSuratController::class, 'create'])->name('pengajuan-surat.create');
Route::post('/pengajuan-surat', [\App\Http\Controllers\PengajuanSuratController::class, 'store'])->name('pengajuan-surat.store');
Route::get('/pengajuan-surat/sukses/{id}', [\App\Http\Controllers\PengajuanSuratController::class, 'success'])->name('pengajuan-surat.success');
Route::get('/pengajuan-surat/cek-status', [\App\Http\Controllers\PengajuanSuratController::class, 'checkStatus'])->name('pengajuan-surat.check-status');
Route::post('/pengajuan-surat/cek-status', [\App\Http\Controllers\PengajuanSuratController::class, 'getStatus'])->name('pengajuan-surat.get-status');

// Pengaduan Routes (Public)
Route::get('/pengaduan', [\App\Http\Controllers\PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [\App\Http\Controllers\PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('/pengaduan/sukses/{id}', [\App\Http\Controllers\PengaduanController::class, 'success'])->name('pengaduan.success');
Route::get('/pengaduan/cek-status', [\App\Http\Controllers\PengaduanController::class, 'checkStatus'])->name('pengaduan.check-status');
Route::post('/pengaduan/cek-status', [\App\Http\Controllers\PengaduanController::class, 'getStatus'])->name('pengaduan.get-status');

// Google OAuth Routes
Route::get('/auth/google', [\App\Http\Controllers\Auth\GoogleController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [\App\Http\Controllers\Auth\GoogleController::class, 'callback'])->name('auth.google.callback');
Route::post('/auth/google/logout', [\App\Http\Controllers\Auth\GoogleController::class, 'logout'])->name('auth.google.logout');

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

    // Hero Sliders Management
    Route::resource('hero-sliders', \App\Http\Controllers\Admin\HeroSliderController::class);

    // Statistics Management
    Route::get('/statistics', [\App\Http\Controllers\Admin\VillageStatisticController::class, 'index'])->name('statistics.index');
    Route::get('/statistics/{villageStatistic}/edit', [\App\Http\Controllers\Admin\VillageStatisticController::class, 'edit'])->name('statistics.edit');
    Route::put('/statistics/{villageStatistic}', [\App\Http\Controllers\Admin\VillageStatisticController::class, 'update'])->name('statistics.update');

    // Site Settings Management
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');

    // Pengajuan Surat Management (Admin)
    Route::resource('pengajuan-surat', \App\Http\Controllers\Admin\PengajuanSuratController::class)->except(['create', 'store']);

    // Jenis Surat Management (Admin)
    Route::resource('jenis-surat', \App\Http\Controllers\Admin\JenisSuratController::class)->except(['show']);

    // Pengaduan Management (Admin)
    Route::resource('pengaduan', \App\Http\Controllers\Admin\PengaduanController::class)->except(['create', 'store']);
    Route::post('/pengaduan/{pengaduan}/tanggapan', [\App\Http\Controllers\Admin\PengaduanController::class, 'storeTanggapan'])->name('pengaduan.tanggapan.store');

    // Leader Greeting Management (Admin)
    Route::resource('leader-greetings', \App\Http\Controllers\Admin\LeaderGreetingController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
