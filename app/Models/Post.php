<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
     "post_id",
     "parent_forum_id",
     "post_author",
     "post_author_email",
     "post_content",
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
