<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    "forum_author",
    "forum_author_email",
    "forum_title",
    "forum_content",
    "tags"
    ];
    protected $casts = [
        'tags' => 'array', // This turns the JSON string into a React-friendly array
    ];
    // getPostById($post_id): returns post by the specified id
    public function getPostById($post_id)
    {
        return $this->where('post_id', $post_id)->first();
    }

    public function getPostByParentForumId($forum_id)
    {
        return $this->where("parent_forum_id", $forum_id)->get();
    }
}
