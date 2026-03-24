<?php

namespace App\Http\Controllers;

use App\Models\Forum; // to import the model
use Illuminate\Support\Facades\Auth; // for the details of the logged in user
use Illuminate\Http\Request;

// To handle fetching of forums
class ForumsController extends Controller
{
    // index(): shows all forums
    public function index()
    {
        $forum = new Forum(); // create a new instance of the Model
        $forumPosts = $forum->getLatestPaginatedForums(15);

        // syntax: return view('view_name', data=['key'='value'], mergeData = [])
        return view('website.forums', ['forum_posts' => $forumPosts]);
    }

    // show only a single forum based on id
    public function show($forumId)
    {
        // If your filter is the primary key of your table, you can just use find() to find the record
        $forum = Forum::find($forumId);

        $forums = new Forum;
        $posts = $forums->getChildPosts($forumId, 15);

        // compact("var_name") is same as ["var_name" => value]
        return view("website.forum", ["forum" => $forum, "posts" => $posts]);
    }

    // isLoggedIn: checks if the current user is logged in or not, if not logged in, redirects them to the login page
    public function redirectUserToLogin()
    {
        if (!Auth::check()) 
        {
            // The user is NOT logged in...
            return redirect()->route('login');
        } 
    }

    // create a new forum
    public function createForum(Request $request)
    {
        // TODO: Redict user if not logged in
        // $this->redirectUserToLogin();

        // Validate request data
        $validatedData = $request->validate([
            "forum_title" => "required|string",
            "forum_author" => "nullable",
            "forum_author_email" => "nullable", // TODO: Use logged in user's email here, same for name
            "forum_content" => "required|string",
            'tags' => "nullable|array",
        ]);
        
        // Get current user
        $user = Auth::user();

        echo "USER DETAILS";
        echo $user;

        // add to Forum table
        $forums = new Forum();

        $forums->forum_title = $validatedData['forum_title'];
        $forums->forum_content = $validatedData['forum_content'];
        $forums->tags = $validatedData['tags'];         

        $forums->forum_author = $user->name;
        $forums->forum_author_email = $user->email;    

        $forums->save();

        return response()->json([
            'message' => 'Forum created successfully!',
            'event'   => $forums
        ], 201);
    }
}
