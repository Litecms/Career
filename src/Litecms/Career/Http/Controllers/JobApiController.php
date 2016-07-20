<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\Career\Interfaces\JobRepositoryInterface;
use Litecms\Career\Repositories\Presenter\JobItemTransformer;

/**
 * Pubic API controller class.
 */
class JobApiController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Litecms\Job\Interfaces\JobRepositoryInterface $job
     *
     * @return type
     */
    public function __construct(JobRepositoryInterface $job)
    {
        $this->middleware('api');
        $this->repository = $job;
        parent::__construct();
    }

    /**
     * Show job's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $jobs = $this->repository
            ->setPresenter('\\Litecms\\Career\\Repositories\\Presenter\\JobListPresenter')
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->paginate();

        $jobs['code'] = 2000;
        return response()->json($jobs)
            ->setStatusCode(200, 'INDEX_SUCCESS');
    }

    /**
     * Show job.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $job = $this->repository
            ->scopeQuery(function ($query) use ($slug) {
                return $query->orderBy('id', 'DESC')
                    ->where('slug', $slug);
            })->first(['*']);

        if (!is_null($job)) {
            $job = $this->itemPresenter($module, new JobItemTransformer);
            $job['code'] = 2001;
            return response()->json($job)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

}
