<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\Controller as BasicController;
use Litecms\Career\Interfaces\JobRepositoryInterface;

class JobController extends BasicController
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
        $this->middleware('web');
        $this->setupTheme(config('theme.themes.public.theme'), config('theme.themes.public.layout'));
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
        $this->repository->pushCriteria(new \Litecms\Career\Repositories\Criteria\JobPublicCriteria());
        $jobs = $this->repository->scopeQuery(function ($query) {
            return $query->orderBy('title');
        })->all();

        return $this->theme->of('career::public.job.index', compact('jobs'))->render();
    }

    /**
     * Show job.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($type)
    {
        //$this->repository->pushCriteria(new \Litecms\Career\Repositories\Criteria\JobPublicCriteria());
        $jobs = $this->repository->scopeQuery(function ($query) use ($type) {
            return $query->orderBy('title')->whereJobType($type);
        })->all();

        return $this->theme->of('career::public.job.index', compact('jobs'))->render();
    }

    /**
     * Show job.
     *
     * @param string $slug
     *
     * @return response
     */
    public function views($slug)
    {

        $job = $this->repository->scopeQuery(function ($query) use ($slug) {
            return $query->whereSlug($slug);
        })->first(['*']);
        return $this->theme->of('career::public.job.show', compact('job'))->render();
    }
}
