<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\ResourceController as BaseController;
use Form;
use Litecms\Career\Http\Requests\ResumeRequest;
use Litecms\Career\Interfaces\ResumeRepositoryInterface;
use Litecms\Career\Models\Resume;

/**
 * Resource controller class for resume.
 */
class ResumeResourceController extends BaseController
{

    /**
     * Initialize resume resource controller.
     *
     * @param type ResumeRepositoryInterface $resume
     *
     * @return null
     */
    public function __construct(ResumeRepositoryInterface $resume)
    {
        parent::__construct();
        $this->repository = $resume;
        $this->repository
            ->pushCriteria(\Litepie\Repository\Criteria\RequestCriteria::class)
            ->pushCriteria(\Litecms\Career\Repositories\Criteria\ResumeResourceCriteria::class);
    }

    /**
     * Display a list of resume.
     *
     * @return Response
     */
    public function index(ResumeRequest $request)
    {
        $view = $this->response->theme->listView();

        if ($this->response->typeIs('json')) {
            $function = camel_case('get-' . $view);
            return $this->repository
                ->setPresenter(\Litecms\Career\Repositories\Presenter\ResumePresenter::class)
                ->$function();
        }

        $resumes = $this->repository->paginate();
        
         return $this->response->setMetaTitle(trans('career::resume.names'))
            ->view('career::resume.index', true)
            ->data(compact('resumes'))
            ->output();
    }

    /**
     * Display resume.
     *
     * @param Request $request
     * @param Model   $resume
     *
     * @return Response
     */
    public function show(ResumeRequest $request, Resume $resume)
    {

        if ($resume->exists) {
            $view = 'career::resume.show';
        } else {
            $view = 'career::resume.new';
        }

        return $this->response->setMetaTitle(trans('app.view') . ' ' . trans('career::resume.name'))
            ->data(compact('resume'))
            ->view($view)
            ->output();
    }

    /**
     * Show the form for creating a new resume.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ResumeRequest $request)
    {

        $resume = $this->repository->newInstance([]);
        return $this->response->setMetaTitle(trans('app.new') . ' ' . trans('career::resume.name')) 
            ->view('career::resume.create', true) 
            ->data(compact('resume'))
            ->output();
    }

    /**
     * Create new resume.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ResumeRequest $request)
    {
        try {
            $attributes              = $request->all();
            $attributes['user_id']   = user_id();
            $attributes['user_type'] = user_type();
            $resume                 = $this->repository->create($attributes);

            return $this->response->message(trans('messages.success.created', ['Module' => trans('career::resume.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('career/resume/' . $resume->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('/career/resume'))
                ->redirect();
        }

    }

    /**
     * Show resume for editing.
     *
     * @param Request $request
     * @param Model   $resume
     *
     * @return Response
     */
    public function edit(ResumeRequest $request, Resume $resume)
    {
        return $this->response->setMetaTitle(trans('app.edit') . ' ' . trans('career::resume.name'))
            ->view('career::resume.edit', true)
            ->data(compact('resume'))
            ->output();
    }

    /**
     * Update the resume.
     *
     * @param Request $request
     * @param Model   $resume
     *
     * @return Response
     */
    public function update(ResumeRequest $request, Resume $resume)
    {
        try {
            $attributes = $request->all();

            $resume->update($attributes);
            return $this->response->message(trans('messages.success.updated', ['Module' => trans('career::resume.name')]))
                ->code(204)
                ->status('success')
                ->url(guard_url('career/resume/' . $resume->getRouteKey()))
                ->redirect();
        } catch (Exception $e) {
            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('career/resume/' . $resume->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove the resume.
     *
     * @param Model   $resume
     *
     * @return Response
     */
    public function destroy(ResumeRequest $request, Resume $resume)
    {
        try {

            $resume->delete();
            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('career::resume.name')]))
                ->code(202)
                ->status('success')
                ->url(guard_url('career/resume/0'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->code(400)
                ->status('error')
                ->url(guard_url('career/resume/' . $resume->getRouteKey()))
                ->redirect();
        }

    }

    /**
     * Remove multiple resume.
     *
     * @param Model   $resume
     *
     * @return Response
     */
    public function delete(ResumeRequest $request, $type)
    {
        try {
            $ids = hashids_decode($request->input('ids'));

            if ($type == 'purge') {
                $this->repository->purge($ids);
            } else {
                $this->repository->delete($ids);
            }

            return $this->response->message(trans('messages.success.deleted', ['Module' => trans('career::resume.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('career/resume'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/career/resume'))
                ->redirect();
        }

    }

    /**
     * Restore deleted resumes.
     *
     * @param Model   $resume
     *
     * @return Response
     */
    public function restore(ResumeRequest $request)
    {
        try {
            $ids = hashids_decode($request->input('ids'));
            $this->repository->restore($ids);

            return $this->response->message(trans('messages.success.restore', ['Module' => trans('career::resume.name')]))
                ->status("success")
                ->code(202)
                ->url(guard_url('/career/resume'))
                ->redirect();

        } catch (Exception $e) {

            return $this->response->message($e->getMessage())
                ->status("error")
                ->code(400)
                ->url(guard_url('/career/resume/'))
                ->redirect();
        }

    }

     public function download($id)
    {
        $id = hashids_decode($id);
        $resume = $this->repository->scopeQuery(function($query) use ($id) {
            return $query->orderBy('id','DESC')
                         ->where('id', $id);
        })->first(['*']);

        $files = $resume->resume;
        foreach($files as $file)
        {
            $file=$file['path'];
        } 
      return response()->download(storage_path("uploads/{$file}"));
    }

}
