<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCommentLike extends Model
{
    protected $table = 'post_comment_like';
}
