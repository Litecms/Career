<?php

namespace Litecms\Career\Repositories\Eloquent;

use Litecms\Career\Interfaces\ResumeRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class ResumeRepository extends BaseRepository implements ResumeRepositoryInterface
{
    /**
     * Booting the repository.
     *
     * @return null
     */
    public function boot()
    {
        $this->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'));
    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        $this->fieldSearchable = config('package.career.resume.search');
        return config('package.career.resume.model');
    }
}
