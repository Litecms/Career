<?php

namespace Litecms\Career\Repositories\Eloquent;

use Litecms\Career\Interfaces\JobRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class JobRepository extends BaseRepository implements JobRepositoryInterface
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
        $this->fieldSearchable = config('package.career.job.search');
        return config('package.career.job.model');
    }
}
