<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
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
}
