<?php

namespace Litecms\Career\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class JobItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new JobItemTransformer();
    }
}