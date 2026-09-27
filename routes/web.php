<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Tugas 4: Aplikasi Multi-View Profil Akademik
|--------------------------------------------------------------------------
| Seluruh rute fungsional diarahkan ke satu PageController tunggal
| sesuai spesifikasi teknis Tugas 4 PBKK.
*/

// Rute 1: Beranda (/ dan /beranda) - Mendukung Tantangan 2: ?user=Nama
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/beranda', [PageController::class, 'home'])->name('beranda');

// Rute 2: Profil Mahasiswa (/profil-mahasiswa) - Komponen Reusable <x-info-card>
Route::get('/profil-mahasiswa', [PageController::class, 'profile'])->name('profile');

// Rute 3: Ide-Riset Agentic AI (/ide-agent) - Mendukung Tantangan 1: ?mode=dark & Form Pengumpulan Ide
Route::get('/ide-agent', [PageController::class, 'ideAgent'])->name('ide-agent');
Route::post('/ide-agent', [PageController::class, 'submitIdea'])->name('ide-agent.submit');

// Fallback route
Route::fallback(function () {
    return redirect()->route('home');
});
