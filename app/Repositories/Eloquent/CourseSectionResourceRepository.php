<?php

namespace App\Repositories\Eloquent;

use App\Models\CourseSectionResource;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\CourseSectionResourceRepositoryInterface;

class CourseSectionResourceRepository extends BaseRepository  implements CourseSectionResourceRepositoryInterface
{

    public function __construct(CourseSectionResource $model)
    {
        parent::__construct($model);
    }
}
