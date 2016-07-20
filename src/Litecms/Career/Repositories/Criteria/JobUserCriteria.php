<?php

namespace Litecms\Career\Repositories\Criteria;

use Litepie\Contracts\Repository\Criteria as CriteriaInterface;
use Litepie\Contracts\Repository\Repository as RepositoryInterface;

class JobUserCriteria implements CriteriaInterface {

    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('user_id','=', user_id() );
        return $model;
    }
}