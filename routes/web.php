<?php

use App\Http\Controllers\ForumsController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// MAIN WEBSITE ROUTES
Route::get('/about', function () {
    return view('website.about');
});

Route::get('/contact', function () {
    return view('website.contact');
});

Route::get("/user-profile", function () {
    return view('website.user-profile');
});

Route::get("/club-edit", function (){
    return view('website.club-edit');
});

Route::get("/event-list", function() {
    return view("website.event-list");
});

Route::get("/club-list", function() {
    return view("website.club-list");
});

// ROUTES FOR FORUMS
// Please follow Controller Function Notation
Route::get('/forums', [ForumsController::class, "index"])->name("website.forums");
Route::get('/forum', [ForumController::class, "index"])->name("website.forum");


require __DIR__.'/auth.php';

