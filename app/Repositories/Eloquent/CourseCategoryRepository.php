<?php

namespace App\Repositories\Eloquent;

use App\Models\CourseCategory;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\CourseCategoryRepositoryInterface;

class CourseCategoryRepository extends BaseRepository implements  CourseCategoryRepositoryInterface
{

    public function __construct(CourseCategory $model)
    {
        parent::__construct($model);
    }
}
