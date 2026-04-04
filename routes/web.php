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
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/profile-add', [ProfileController::class, 'update'])->name('profile.update');
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


// Routes for FORUMS and posts

// For replies to show for each post
Route::post('/post-add', [PostController::class, "createPost"])->middleware('auth')->name("post.create");
Route::delete('/forums/{forumId}/posts/{postId}', [PostController::class, "destroy"])->middleware('auth')->name("post.destroy");

// Please follow Controller Function Notation
Route::get("/forums", [ForumsController::class, "index"])->name("website.forums");
Route::get("/forums/{forumId}", [PostController::class, "show"])->name("forums.show"); // individual forum post

Route::post('/forum-add', [ForumsController::class, "createForum"])->middleware('auth')->name("forums.create");
Route::delete("/forums/{forumId}", [ForumsController::class, "destroy"])->middleware(['auth', 'verified'])->name("forums.destroy");



// Routes for EVENTS
Route::get('/event-list', [EventController::class, "index"])->name("website.event-list");
Route::get('/event-list/{eventId}', [EventController::class, "show"])->name("website.event-list.show");
Route::get('/event-list/{eventId}/join', [EventController::class, "joinEvent"])->middleware(['auth', 'verified'])->name("website.event-list.join");

Route::post("/event-add", [EventController::class, "createEvent"])->middleware(['auth', 'verified'])->name("events.create"); // add event
Route::delete("/event-list/{eventId}", [EventController::class, "destroy"])->middleware(['auth', 'verified'])->name("events.delete"); // delete event


// Routes for CLUBS / ORGANIZATIONS
Route::get("/club-list", [OrganizationController::class, "index"])->name("website.club-list");
Route::post("/clubs-list/filter", [OrganizationController::class, "filter"])->middleware(['auth', 'verified'])->name("website.club-list.filter");
Route::get("/clubs-list/{clubId}", [OrganizationController::class, "show"])->name("clubs.show");
Route::get('/clubs-list/{clubId}/join', [OrganizationController::class, "joinClub"])->middleware(['auth', 'verified'])->name("website.clubs-list.join");
 // for individual club pages

Route::get("/new-club", function() { return view('website.new-club'); })->middleware(['auth', 'verified'])->name("club.new");
Route::post("/club-add", [OrganizationController::class, "createOrganization"])->middleware(["auth", "verified"])->name("club.add");
Route::get("/club-edit", function() { return view('website.club-edit'); })->middleware(['auth', 'verified'])->name("club.edit");
Route::delete("clubs-list/{clubId}", [OrganizationController::class, "destroy"])->middleware(["auth", "verified"])->name("club.destroy");


// Routes for Community / USER PROFILE
Route::get("/community", [ProfileController::class, "index"])->name("website.community");
Route::post("/community/filter", [ProfileController::class, "filter"])->middleware(['auth', 'verified'])->name("website.community.filter");
Route::get("/community/{userId}", [ProfileController::class, "showDashboard"])->name('community.show');

Route::post('/comment-add', [ProfileController::class, "createComment"])->name('community.create');  

// Route to see any user profile
Route::get('/userProfile/{userId}', [ProfileController::class, 'showDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('userProfile');




require __DIR__.'/auth.php';

