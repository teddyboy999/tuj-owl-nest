<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
use Illuminate\Http\Request;

// Forum controller only to return forum posts of a specific id
class PostController extends Controller
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
            "post_author" => "required",
            "post_author_email" => "required",
            "post_content" => "required",
        ]);

        // add to posts table
        $posts = new Post();
        $posts->create($validatedData);

        return view('website.forum', ['posts' => $posts]);
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
