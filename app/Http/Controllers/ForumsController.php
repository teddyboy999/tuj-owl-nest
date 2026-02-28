<?php

namespace App\Http\Controllers;

use App\Models\Forum; // to import the model
use Illuminate\Http\Request;

// To handle fetching of forums
class ForumsController extends Controller
{
    // main
    public function index()
    {
        $forum = new Forum(); // create a new instance of the Model
        $forumPosts = $forum->getLatestPaginatedForums(15);

        // syntax: return view('view_name', data=['key'='value'], mergeData = [])
        return view('website.forums', ['forum_posts' => $forumPosts]);
    }
}
