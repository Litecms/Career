<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\Career\Http\Requests\JobAdminRequest;
use Litecms\Career\Interfaces\JobRepositoryInterface;
use Litecms\Career\Models\Job;

/**
 * Admin web controller class.
 */
class JobAdminController extends BaseController
{
    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    public $guard = 'admin.web';

    /**
     * The home page route of admin.
     *
     * @var string
     */
    public $home = 'admin';
    /**
     * Initialize job controller.
     *
     * @param type JobRepositoryInterface $job
     *
     * @return type
     */
    public function __construct(JobRepositoryInterface $job)
    {
        $this->middleware('web');
        $this->middleware('auth:admin.web');
        $this->setupTheme(config('theme.themes.admin.theme'), config('theme.themes.admin.layout'));
        $this->repository = $job;
        parent::__construct();
    }

    /**
     * Display a list of job.
     *
     * @return Response
     */
    public function index(JobAdminRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        if ($request->wantsJson()) {
            $jobs = $this->repository
                ->setPresenter('\\Litecms\\Career\\Repositories\\Presenter\\JobListPresenter')
                ->scopeQuery(function ($query) {
                    return $query->orderBy('title');
                })->paginate($pageLimit);

            $jobs['recordsTotal'] = $jobs['meta']['pagination']['total'];
            $jobs['recordsFiltered'] = $jobs['meta']['pagination']['total'];
            $jobs['request'] = $request->all();
            return response()->json($jobs, 200);

        }

        $this->theme->prependTitle(trans('career::job.names') . ' :: ');
        return $this->theme->of('career::admin.job.index')->render();
    }

    /**
     * Display job.
     *
     * @param Request $request
     * @param Model   $job
     *
     * @return Response
     */
    public function show(JobAdminRequest $request, Job $job)
    {

        if (!$job->exists) {
            return response()->view('career::admin.job.new', compact('job'));
        }

        Form::populate($job);
        return response()->view('career::admin.job.show', compact('job'));
    }

    /**
     * Show the form for creating a new job.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(JobAdminRequest $request)
    {

        $job = $this->repository->newInstance([]);

        Form::populate($job);

        return response()->view('career::admin.job.create', compact('job'));

    }

    /**
     * Create new job.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(JobAdminRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id('admin.web');
            $job = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('career::job.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/career/job/' . $job->getRouteKey()),
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 400,
            ], 400);
        }

    }

    /**
     * Show job for editing.
     *
     * @param Request $request
     * @param Model   $job
     *
     * @return Response
     */
    public function edit(JobAdminRequest $request, Job $job)
    {
        Form::populate($job);
        return response()->view('career::admin.job.edit', compact('job'));
    }

    /**
     * Update the job.
     *
     * @param Request $request
     * @param Model   $job
     *
     * @return Response
     */
    public function update(JobAdminRequest $request, Job $job)
    {
        try {

            $attributes = $request->all();

            $job->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('career::job.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/career/job/' . $job->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/career/job/' . $job->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Remove the job.
     *
     * @param Model   $job
     *
     * @return Response
     */
    public function destroy(JobAdminRequest $request, Job $job)
    {

        try {

            $t = $job->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('career::job.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/career/job/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/career/job/' . $job->getRouteKey()),
            ], 400);
        }

    }

}
