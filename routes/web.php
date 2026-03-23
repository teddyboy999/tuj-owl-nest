<?php

use Illuminate\Support\Facades\Route;
// Custome controllers
use App\Http\Controllers\ForumsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

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

Route::get("/club-list", function() {
    return view("website.club-list");
});

// Routes for FORUMS
// Please follow Controller Function Notation
Route::get('/forums', [ForumsController::class, "index"])->name("website.forums");
Route::get('/forum', [PostController::class, "index"])->name("website.forum");
Route::post("/forum-add", [PostController::class, "createForumPost"])->name('forums.create');

// Routes for EVENTS
Route::get('/event-list', [EventController::class, "index"])->name("website.event-list");
Route::post("/event-add", [EventController::class, "createEvent"])->name("events.create"); // add event

// Routes for CLUBS
// TODO: Route::post("/club-add", [])


require __DIR__.'/auth.php';

