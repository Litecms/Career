<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Litecms\Career\Interfaces\JobRepositoryInterface;

class JobPublicController extends BaseController
{
    // use JobWorkflow;

    /**
     * Constructor.
     *
     * @param type \Litecms\Job\Interfaces\JobRepositoryInterface $job
     *
     * @return type
     */
    public function __construct(JobRepositoryInterface $job)
    {
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
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->setMetaTitle(trans('career::job.names'))
            ->view('career::public.job.index')
            ->data(compact('jobs'))
            ->output();
    }

    /**
     * Show job's list based on a type.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function list($type = null)
    {
        $jobs = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->setMetaTitle(trans('career::job.names'))
            ->view('career::public.job.index')
            ->data(compact('jobs'))
            ->output();
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
        $job = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->response->setMetaTitle(trans('career::job.name'))
            ->view('career::public.job.show')
            ->data(compact('job'))
            ->output();
    }

    protected function apply($slug)
    {
       
         $resume = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);
        
           return $this->response->setMetaTitle(trans('career::resume.resume'))
               ->view('career::public.job.resume')
               ->data(compact('resume'))
               ->output();
    }

}
