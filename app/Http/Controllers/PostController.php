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

        $forumPosts = Post::latest()->paginate(10);

    return view('website.forums', [
        'forum_posts' => $forumPosts // This must match the @foreach ($forum_posts...)
    ]);
    }

    // CREATES a forum post
    public function createForumPost(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            "post_title" => "required|string",
            "post_author" => "nullable",
            "post_author_email" => "nullable", // TODO: Use logged in user's email here, same for name
            "post_content" => "required|string",
            'tags' => "nullable|array",
        ]);

        // add to Forum table
        $post = new Post();

        $post->post_title = $validatedData['post_title'];
        $post->post_content = $validatedData['post_content'];
        $post->tags = $validatedData['tags']; 
        
        $post->parent_forum_id = 1;
        $post->post_author = "Alonzo";
        $post->post_author_email = "test@gmail.com";
    
    

        $post->save();
        return response()->json([
        'message' => 'Post created successfully!',
        'event'   => $post
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
