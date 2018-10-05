<?php

namespace Litecms\Career\Repositories\Presenter;

use Litepie\Repository\Presenter\FractalPresenter;

class ResumePresenter extends FractalPresenter {

    /**
     * Prepare data to present
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ResumeTransformer();
    }
}