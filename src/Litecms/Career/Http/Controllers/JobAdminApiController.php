<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Litecms\Career\Http\Requests\JobAdminApiRequest;
use Litecms\Career\Interfaces\JobRepositoryInterface;
use Litecms\Career\Models\Job;

/**
 * Admin API controller class.
 */
class JobAdminApiController extends BaseController
{

    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'admin.api';

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
        $this->middleware('jwt.auth:admin.api');
        $this->setupTheme(config('theme.themes.admin.theme'), config('theme.themes.admin.layout'));
        $this->repository = $job;
        parent::__construct();
    }

    /**
     * Display a list of job.
     *
     * @return json
     */
    public function index(JobAdminApiRequest $request)
    {
        $jobs = $this->repository
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
    public function show(JobAdminApiRequest $request, Job $job)
    {
        $job = $job->presenter();
        $job['code'] = 2001;
        return response()->json($job)
            ->setStatusCode(200, 'SHOW_SUCCESS');

    }

    /**
     * Show the form for creating a new job.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(JobAdminApiRequest $request, Job $job)
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
    public function store(JobAdminApiRequest $request)
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
    public function edit(JobAdminApiRequest $request, Job $job)
    {
        $job = $job->presenter();
        $job['code'] = 2003;
        return response()->json($job)
            ->setStatusCode(200, 'EDIT_SUCCESS');
    }

    /**
     * Update the job.
     *
     * @param Request $request
     * @param Model   $job
     *
     * @return json
     */
    public function update(JobAdminApiRequest $request, Job $job)
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
    public function destroy(JobAdminApiRequest $request, Job $job)
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
