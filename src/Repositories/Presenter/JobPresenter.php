<?php

namespace Litecms\Career\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class JobPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new JobTransformer();
    }
}