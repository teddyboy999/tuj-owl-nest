<?php

use Illuminate\Support\Facades\Route;
// Custome controllers
use App\Http\Controllers\ForumsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrganizationController;
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

Route::get("/new-club", function() {
    return view('website.new-club');
});

// Routes for FORUMS
// Please follow Controller Function Notation
Route::get('/forums', [ForumsController::class, "index"])->name("website.forums");
Route::get("/forums/{forumId}", [ForumsController::class, "show"])->name("forums.show"); // individual forum post
Route::post('/forum-add', [ForumsController::class, "createForum"])->middleware('auth')->name("forums.create");

// For replies to show for each post
Route::post('/post-add', [PostController::class, "createPost"])->middleware('auth')->name("post.create");

// Routes for EVENTS
Route::get('/event-list', [EventController::class, "index"])->name("website.event-list");
Route::post("/event-add", [EventController::class, "createEvent"])->middleware(['auth', 'verified'])->name("events.create"); // add event

// Routes for CLUBS / ORGANIZATIONS
Route::get("/club-list", [OrganizationController::class, "index"])->name("website.club-list");
Route::get("/clubs-list/{clubId}", [OrganizationController::class, "show"])->name("clubs.show"); // for individual club pages

Route::post("/club-add", [OrganizationController::class, "createOrganization"])->middleware("auth")->name("clubs.add");

// Routes for Community
Route::get("/community", [ProfileController::class, "index"])->name("website.community");
Route::get("/community/{userId}", [ProfileController::class, "show"])->name('community.show');





require __DIR__.'/auth.php';

