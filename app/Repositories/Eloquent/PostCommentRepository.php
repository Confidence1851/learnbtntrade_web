<?php

namespace App\Repositories\Eloquent;

use App\Models\PostComment;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\PostCommentRepositoryInterface;

class PostCommentRepository extends BaseRepository implements PostCommentRepositoryInterface
{
    public function __construct(PostComment $model)
    {
        parent::__construct($model);
    }
}
