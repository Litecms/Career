<?php

namespace Litecms\Career\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class JobListPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new JobListTransformer();
    }
}