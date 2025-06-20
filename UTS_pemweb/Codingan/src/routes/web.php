<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Livewire\ShowHomePage;

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});

// Halaman Home (Livewire)
Route::get('/', ShowHomePage::class)->name('home');

// Halaman Profile (Blade biasa)
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

// Halaman Login Admin (sementara)
Route::get('/admin/login', function () {
    return 'Halaman Login Admin (sementara)';
});