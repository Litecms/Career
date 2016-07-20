<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\Career\Http\Requests\JobUserRequest;
use Litecms\Career\Interfaces\JobRepositoryInterface;
use Litecms\Career\Models\Job;

class JobUserController extends BaseController
{
    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'web';

    /**
     * The home page route of user.
     *
     * @var string
     */
    protected $home = 'home';
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
        $this->middleware('auth:web');
        $this->middleware('auth.active:web');
        $this->setupTheme(config('theme.themes.user.theme'), config('theme.themes.user.layout'));
        $this->repository = $job;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(JobUserRequest $request)
    {
        $this->repository->pushCriteria(new \Litecms\Career\Repositories\Criteria\JobUserCriteria());
        $jobs = $this->repository->scopeQuery(function ($query) {
            return $query->orderBy('title');
        })->paginate();

        $this->theme->prependTitle(trans('career::job.names') . ' :: ');

        return $this->theme->of('career::user.job.index', compact('jobs'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Job $job
     *
     * @return Response
     */
    public function show(JobUserRequest $request, Job $job)
    {
        Form::populate($job);

        return $this->theme->of('career::user.job.show', compact('job'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(JobUserRequest $request)
    {

        $job = $this->repository->newInstance([]);
        Form::populate($job);

        return $this->theme->of('career::user.job.create', compact('job'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(JobUserRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $job = $this->repository->create($attributes);

            return redirect(trans_url('/user/career/job'))
                ->with('message', trans('messages.success.created', ['Module' => trans('career::job.name')]))
                ->with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Job $job
     *
     * @return Response
     */
    public function edit(JobUserRequest $request, Job $job)
    {

        Form::populate($job);

        return $this->theme->of('career::user.job.edit', compact('job'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Job $job
     *
     * @return Response
     */
    public function update(JobUserRequest $request, Job $job)
    {
        try {
            $attributes = $request->all();
            $attributes['published'] = 'No';
            $this->repository->update($attributes, $job->getRouteKey());

            return redirect(trans_url('/user/career/job'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('career::job.name')]))
                ->with('code', 204);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Remove the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy(JobUserRequest $request, Job $job)
    {
        try {
            $this->repository->delete($job->getRouteKey());
            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('career::job.name')]),
                'code'     => 202,
                'redirect' => trans_url('/user/career/job'),
            ], 202);


        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
