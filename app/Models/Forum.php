<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = [
     "id",
     "forum_title",
     "parent_forum_id",
     "forum_author",
     "forum_author_email",
     "forum_content",
     "tags"
    ];

     protected $casts = [
        'tags' => 'array', 
    ];

    // getForumById($forum_id): returns forum post title and description by id provided
    public function getForumById($forum_id)
    {
        return $this->where('id', $forum_id)->first();
    }
    
    // getLatestForums($pagination_num) gets latest posts by number of posts for pagination
    // ref (Pagination - Intro): https://laravel.com/docs/12.x/pagination#introduction
    // ref (Display Pagination Results): https://laravel.com/docs/12.x/pagination#displaying-pagination-results     public function getLatestForums($pagination_num)
    public function getPaginatedForums($paginate_num)
    {
        return $this->paginate($paginate_num);
    }

    public function getLatestPaginatedForums($paginate_num)
    {
        return $this->orderBy("created_at", "desc")->paginate($paginate_num);
    }

    public function getAllForums()
    {
        return $this->all();
    }

    // Get all the posts related to this forum (paginated)
    public function getChildPosts($forumId, $paginate_num)
    {
        // get all posts where the forum id matches
        $posts = Post::where("parent_forum_id", $forumId)->paginate($paginate_num);

        return $posts;
    }
}
