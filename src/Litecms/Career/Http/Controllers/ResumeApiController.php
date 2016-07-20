<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\Career\Interfaces\ResumeRepositoryInterface;
use Litecms\Career\Repositories\Presenter\ResumeItemTransformer;

/**
 * Pubic API controller class.
 */
class ResumeApiController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Litecms\Resume\Interfaces\ResumeRepositoryInterface $resume
     *
     * @return type
     */
    public function __construct(ResumeRepositoryInterface $resume)
    {
        $this->middleware('api');
        $this->repository = $resume;
        parent::__construct();
    }

    /**
     * Show resume's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $resumes = $this->repository
            ->setPresenter('\\Litecms\\Career\\Repositories\\Presenter\\ResumeListPresenter')
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->paginate();

        $resumes['code'] = 2000;
        return response()->json($resumes)
            ->setStatusCode(200, 'INDEX_SUCCESS');
    }

    /**
     * Show resume.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $resume = $this->repository
            ->scopeQuery(function ($query) use ($slug) {
                return $query->orderBy('id', 'DESC')
                    ->where('slug', $slug);
            })->first(['*']);

        if (!is_null($resume)) {
            $resume = $this->itemPresenter($module, new ResumeItemTransformer);
            $resume['code'] = 2001;
            return response()->json($resume)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

}
