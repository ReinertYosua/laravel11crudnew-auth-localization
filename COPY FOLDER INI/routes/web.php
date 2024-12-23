<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;



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

