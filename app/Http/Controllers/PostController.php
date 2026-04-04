<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Forum controller only to return forum posts of a specific id
class PostController extends Controller
{
    // getForumPostByID($forum_post_id)
    public function index()
    {

        $post = new Post();
        $posts = $post->getLatestPaginatedForums(15);

        return view('website.forums', ['forum_reply' => $posts]);
    }

    public function show($id)
        {
            $forum = Forum::findOrFail($id);

            $posts = $this->getForumComments($id, 10);

            return view('website.forum', [
                'forum' => $forum,
                'posts' => $posts
            ]);
        }

        public function getForumComments($forumId, int $paginate_num)
        {
           return Post::where('parent_forum_id', $forumId)
                    ->where('post_type', 'forum')
                    ->paginate($paginate_num);
        }

    // CREATES a forum post
    public function createPost(Request $request)
    {
        // TODO: add id in the route (pass event id)
        $validatedData = $request->validate([
            "post_author" => "string",
            "post_content" => "required",
            "post_author_email" => "string",
            "parent_forum_id" => "required|integer",
        ]);

        $user = Auth::user();

        $posts = new Post();
        $posts->post_author_id = Auth::user()->id;

        $posts->post_content = $validatedData['post_content'];
        $posts->parent_forum_id = $validatedData['parent_forum_id'];

        $posts->post_author = $user->name;
        $posts->post_author_email = $user->email;
       

        $posts->save();

        return response()->json([
            'message' => 'Forum created successfully!',
            'event'   => $posts
        ], 201);
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

        return redirect()->route('website.forums', ['post' => $post])->with('success', 'Event updated successfully.');
    }

    public function destroy($forumId, $postId)
    {
        $post = Post::where("post_id", $postId)->firstOrFail();

        // Get the forum we were referring to
        $forumId = $post->parent_forum_id;
        $forum = Forum::find($forumId);

        $forums = new Forum;
        $posts = $forums->getChildPosts($forumId, 15);

        // Finally delete the forum
        Post::where("post_id", $postId)->delete();

        return redirect()->route("forums.show", ['forumId' => $forumId, 'forum' => $forum, 'posts' => $posts])->with("success", "Deleted post successfully!");
    }
}
