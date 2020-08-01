<?php

namespace App\Repositories\Eloquent;

use App\Models\PostCategory;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\PostCategoryRepositoryInterface;

class PostCategoryRepository extends BaseRepository implements  PostCategoryRepositoryInterface
{

    public function __construct(PostCategory $model)
    {
        parent::__construct($model);
    }
}
