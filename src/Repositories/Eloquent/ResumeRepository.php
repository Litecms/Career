<?php

namespace Litecms\Career\Repositories\Eloquent;

use Litecms\Career\Interfaces\ResumeRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ResumeRepository extends BaseRepository implements ResumeRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('litecms.career.resume.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.career.resume.model.model');
    }
}
