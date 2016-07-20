<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\Career\Http\Requests\JobUserApiRequest;
use Litecms\Career\Interfaces\JobRepositoryInterface;
use Litecms\Career\Models\Job;

/**
 * User API controller class.
 */
class JobUserApiController extends BaseController
{

    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'api';
    /**
     * Initialize job controller.
     *
     * @param type JobRepositoryInterface $job
     *
     * @return type
     */
    public function __construct(JobRepositoryInterface $job)
    {
        $this->middleware('api');
        $this->middleware('jwt.auth:api');
        $this->setupTheme(config('theme.themes.user.theme'), config('theme.themes.user.layout'));
        $this->repository = $job;
        parent::__construct();
    }

    /**
     * Display a list of job.
     *
     * @return json
     */
    public function index(JobUserApiRequest $request)
    {
        $jobs = $this->repository
            ->pushCriteria(new \Lavalite\Career\Repositories\Criteria\JobUserCriteria())
            ->setPresenter('\\Litecms\\Career\\Repositories\\Presenter\\JobListPresenter')
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->all();
        $jobs['code'] = 2000;
        return response()->json($jobs)
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display job.
     *
     * @param Request $request
     * @param Model   Job
     *
     * @return Json
     */
    public function show(JobUserApiRequest $request, Job $job)
    {

        if ($job->exists) {
            $job = $job->presenter();
            $job['code'] = 2001;
            return response()->json($job)
                ->setStatusCode(200, 'SHOW_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Show the form for creating a new job.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(JobUserApiRequest $request, Job $job)
    {
        $job = $job->presenter();
        $job['code'] = 2002;
        return response()->json($job)
            ->setStatusCode(200, 'CREATE_SUCCESS');
    }

    /**
     * Create new job.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(JobUserApiRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id('admin.api');
            $job = $this->repository->create($attributes);
            $job = $job->presenter();
            $job['code'] = 2004;

            return response()->json($job)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');
        }

    }

    /**
     * Show job for editing.
     *
     * @param Request $request
     * @param Model   $job
     *
     * @return json
     */
    public function edit(JobUserApiRequest $request, Job $job)
    {

        if ($job->exists) {
            $job = $job->presenter();
            $job['code'] = 2003;
            return response()->json($job)
                ->setStatusCode(200, 'EDIT_SUCCESS');
        } else {
            return response()->json([])
                ->setStatusCode(400, 'SHOW_ERROR');
        }

    }

    /**
     * Update the job.
     *
     * @param Request $request
     * @param Model   $job
     *
     * @return json
     */
    public function update(JobUserApiRequest $request, Job $job)
    {
        try {

            $attributes = $request->all();

            $job->update($attributes);
            $job = $job->presenter();
            $job['code'] = 2005;

            return response()->json($job)
                ->setStatusCode(201, 'UPDATE_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }

    }

    /**
     * Remove the job.
     *
     * @param Request $request
     * @param Model   $job
     *
     * @return json
     */
    public function destroy(JobUserApiRequest $request, Job $job)
    {

        try {

            $t = $job->delete();

            return response()->json([
                'message' => trans('messages.success.delete', ['Module' => trans('career::job.name')]),
                'code'    => 2006,
            ])->setStatusCode(202, 'DESTROY_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4006,
            ])->setStatusCode(400, 'DESTROY_ERROR');
        }

    }

}
