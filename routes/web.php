<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

// Website/Frontend Routes

/// If the view is in a folder: folder.view-name
/// You don't need to include the full file name ("about.blade.php")
Route::get('/about', function () {
    return view('website.about');
});

require __DIR__.'/settings.php';
