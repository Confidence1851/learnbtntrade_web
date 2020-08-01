<?php

namespace App\Repositories\Eloquent;

use App\Models\CourseSection;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\CourseSectionRepositoryInterface;

class CourseSectionRepository extends BaseRepository  implements CourseSectionRepositoryInterface
{

    public function __construct(CourseSection $model)
    {
        parent::__construct($model);
    }
}
