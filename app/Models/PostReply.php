<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostReply extends Model
{
    // getReplyByParentPostId($parent_post_id): gets all post replies linked to a single post
    public function getReplyByParentPostId($parent_post_id)
    {
        return $this->where("parent_post_id", $parent_post_id)->get();
    }
}
