<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

// Forum controller only to return forum posts of a specific id
class ForumController extends Controller
{
    // getForumPostByID($forum_post_id)
    public function index()
    {
        // TODO: DYNAMIC FORUM POST LOADING BASED ON WHAT USER CLICKS
        $forum_id = 1; // TESTING

        $forum = new Forum(); // create a new instance of the Model
        $forumPost = $forum->getForumById($forum_id); 

        $posts = new Post();
        $postsUnderForum = $posts->getPostByParentForumId($forum_id);

        // syntax: return view('view_name', data=['key'=>'value'], mergeData = [])
        return view('website.forum', ['forum_post' => $forumPost, 'posts' => $postsUnderForum]);
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
        $forum = new Forum();

        $forum->forum_title = $validatedData['post_title'];
        $forum->forum_content = $validatedData['post_content'];
        $forum->tags = $validatedData['tags']; 
        
        $forum->forum_author = "Alonzo";
        $forum->forum_author_email = "test@gmail.com";
    
    

        $forum->save();
        return response()->json([
        'message' => 'Post created successfully!',
        'event'   => $forum
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
