<?php

namespace Litecms\Career\Repositories\Eloquent;

use Litecms\Career\Interfaces\JobRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class JobRepository extends BaseRepository implements JobRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('litecms.career.job.model.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('litecms.career.job.model.model');
    }

    public function updatePublish($id, $attribute)
    {
        return $this->model->where('id', $id)->update($attribute);
    }

    public function jobs()
    {
        return $this->model->pluck('title','id');
    }
}
