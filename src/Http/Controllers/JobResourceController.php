<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Litecms\Career\Http\Requests\JobRequest;
use Litecms\Career\Interfaces\JobRepositoryInterface;
use Litecms\Career\Models\Job;

/**
 * Resource controller class for job.
 */
class JobResourceController extends BaseController
{

    /**
     * Initialize job resource controller.
     *
     * @param type JobRepositoryInterface $job
     *
     * @return null
     */
    public function __construct(JobRepositoryInterface $job)
    {
        parent::__construct();
        $this->repository = $job;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Career\Repositories\Criteria\JobResourceCriteria::class);
    }

    /**
     * Display a list of job.
     *
     * @return Response
     */
    public function index(JobRequest $request)
    {
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Litecms\Career\Repositories\Presenter\JobPresenter::class)
                ->$function();
        }

        $jobs = $this->repository->paginate();

        return $this->response->setMetaTitle(trans('career::job.names'))
            ->view('career::job.index', true)
            ->data(compact('jobs'))
            ->output();
    }

    /**
     * Display job.
     *
     * @param Request $request
     * @param Model   $job
     *
     * @return Response
     */
    public function show(JobRequest $request, Job $job)
    {

        if ($job->exists) {
            $view = 'career::job.show';
        } else {
            $view = 'career::job.new';
        }

        return $this->response->setMetaTitle(trans('app.view') . ' ' . trans('career::job.name'))
            ->data(compact('job'))
            ->view($view, true)
            ->output();
    }

    /**
     * Show the form for creating a new job.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(JobRequest $request)
    {

        $job = $this->repository->newInstance([]);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('career::job.name')) 
            ->view('career::job.create', true) 
            ->data(compact('job'))
            ->output();
    }

    /**
     * Create new job.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(JobRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $job                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('career::job.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('career/job/' . $job->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/career/job'))
                ->redirect();
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
    public function edit(JobRequest $request, Job $job)
    {
        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('career::job.name'))
            ->view('career::job.edit', true)
            ->data(compact('job'))
            ->output();
    }

    /**
     * Update the job.
     *
     * @param Request $request
     * @param Model   $job
     *
     * @return Response
     */
    public function update(JobRequest $request, Job $job)
    {
        try {
            $attributes = $request->all();

            $job->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('career::job.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('career/job/' . $job->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('career/job/' . $job->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the job.
     *
     * @param Model   $job
     *
     * @return Response
     */
    public function destroy(JobRequest $request, Job $job)
    {
        try {

            $job->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('career::job.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('career/job/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('career/job/' . $job->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple job.
     *
     * @param Model   $job
     *
     * @return Response
     */
    public function delete(JobRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('career::job.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('career/job'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/career/job'))
                ->redirect();
        }

    }

    /**
     * Restore deleted jobs.
     *
     * @param Model   $job
     *
     * @return Response
     */
    public function restore(JobRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('career::job.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/career/job'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/career/job/'))
                ->redirect();
        }

    }

}
