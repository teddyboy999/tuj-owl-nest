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
    public function createPost(Request $request)
    {
        // TODO: add id in the route (pass event id)
        $validatedData = $request->validate([
            "name" => "required|unique",
            "description" => "required",
            "date" => "required|date",
            "start_time" => "required",
            "end_time" => "required"
        ]);

        $post = new Post;

        $post->fill($validatedData);

        $post->save();

        return redirect()->route('website.forum', ['post' => $post])->with('success', 'Event updated successfully.');
    }

    // UPDATING existing forum post
    public function updatePost(Request $request, Post $post)
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
