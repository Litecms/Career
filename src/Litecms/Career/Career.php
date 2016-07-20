<?php

namespace Litecms\Career;

class Career
{
    /**
     * $job object.
     */
    protected $job;
    /**
     * $resume object.
     */
    protected $resume;

    /**
     * Constructor.
     */
    public function __construct(\Litecms\Career\Interfaces\JobRepositoryInterface $job,
        \Litecms\Career\Interfaces\ResumeRepositoryInterface                          $resume) {
        $this->job = $job;
        $this->resume = $resume;
    }

    /**
     * Returns count of career.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count($module)
    {

        return $this->$module
            ->scopeQuery(function ($query) {
                return $query;
            })->count();

    }

    /**
     * Returns count of career.
     *
     * @param array $filter
     *
     * @return int
     */
    public function getCount()
    {
        $this->job->pushCriteria(new \Litecms\Career\Repositories\Criteria\JobPublicCriteria());
        return $this->job
            ->scopeQuery(function ($query) {
                return $query;
            })->count();

    }

    /**
     * Returns count of career.
     * @return int
     */
    public function getJob()
    {
        $array = [];
        $this->job->pushCriteria(new \Litecms\Career\Repositories\Criteria\JobPublicCriteria());
        $jobs = $this->job->scopeQuery(function ($query) {
            return $query->orderBy('title');
        })->all();

        foreach ($jobs as $key => $job) {
            $array[$job['id']] = ucfirst($job['title']);
        }

        return $array;
    }

    /**
     * Returns count of career.
     * @return int
     */
    public function getJobCount($type)
    {
        $this->job->pushCriteria(new \Litecms\Career\Repositories\Criteria\JobPublicCriteria());
        return $this->job->scopeQuery(function ($query) use ($type) {
            return $query->orderBy('title')->whereJobType($type);
        })->count();

    }

}
