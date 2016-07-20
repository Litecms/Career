<?php

namespace Litecms\Career\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class ResumeItemPresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ResumeItemTransformer();
    }
}