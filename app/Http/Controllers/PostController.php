<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

// Forum controller only to return forum posts of a specific id
class PostController extends Controller
{
    // getForumPostByID($forum_post_id)
    public function index()
    {

        $forumPosts = Forum::latest()->paginate(10);

    return view('website.forums', [
        'forum_posts' => $forumPosts 
    ]);
    }

    // CREATES a forum post
    public function createForumPost(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            "forum_title" => "required|string",
            "forum_author" => "nullable",
            "forum_author_email" => "nullable", // TODO: Use logged in user's email here, same for name
            "forum_content" => "required|string",
            'tags' => "nullable|array",
        ]);

        // add to Forum table
        $forums = new Forum();

        $forums->forum_title = $validatedData['forum_title'];
        $forums->forum_content = $validatedData['forum_content'];
        $forums->tags = $validatedData['tags']; 
        
        
        $forums->forum_author = "Alonzo";
        $forums->forum_author_email = "test@gmail.com";
    
    

        $forums->save();
        return response()->json([
        'message' => 'Forum created successfully!',
        'event'   => $forums
    ], 201);
    }

    // UPDATING existing forum post
    public function updateForumPost(Request $request, Post $post)
    {
        // TODO: add id in the route (pass event id)
        $validatedData = $request->validate([
            "name" => "required|unique",
            "description" => "required",
            "date" => "required|date",
            "start_time" => "required",
            "end_time" => "required"
        ]);

        $post->fill($validatedData);

        $post->save();

        return redirect()->route('website.forum', ['post' => $post])->with('success', 'Event updated successfully.');
    }
}
