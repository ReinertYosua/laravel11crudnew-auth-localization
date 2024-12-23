<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;


//CekRole:user 
//CekRole -> adalah nama alias dari middleware yang didaftarkan pada bootstrap/app.php
//:user -> adalah nilai dari variable yang dideklarasikan pada Middleware CekRole.php pada App\Http\Middleware
//artinya hanya role user atau role yang dideklarasikan saja yang bisa akses route yang ada

Route::middleware(['auth','CekRole:user'])->group(function () {
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::get('/', function () {
        return view('layouts.master');
    });
});


Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'id'])) {
        session(['locale' => $locale]);
        // dd($locale);
    }
    return redirect()->back();
})->name('set-locale');
Auth::routes();

Route::middleware(['auth','CekRole:admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

