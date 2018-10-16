<?php

namespace Litecms\Career;

use User;

class Career
{
    /**
     * $resume object.
     */
    protected $resume;
    /**
     * $job object.
     */
    protected $job;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\Career\Interfaces\ResumeRepositoryInterface $resume,
        \Litecms\Career\Interfaces\JobRepositoryInterface $job)
    {
        $this->resume = $resume;
        $this->job = $job;
    }

    /**
     * Returns count of career.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    // public function gadget($view = 'admin.resume.gadget', $count = 10)
    // {

    //     if (User::hasRole('user')) {
    //         $this->resume->pushCriteria(new \Litepie\Litecms\Repositories\Criteria\ResumeUserCriteria());
    //     }

    //     $resume = $this->resume->scopeQuery(function ($query) use ($count) {
    //         return $query->orderBy('id', 'DESC')->take($count);
    //     })->all();

    //     return view('career::' . $view, compact('resume'))->render();
    // }
    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.job.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->job->pushCriteria(new \Litepie\Litecms\Repositories\Criteria\JobUserCriteria());
        }

        $job = $this->job->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('career::' . $view, compact('job'))->render();
    }

    public function jobs()
    {
        return $this->job->jobs();
    }
}
