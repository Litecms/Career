<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\Career\Http\Requests\ResumeUserRequest;
use Litecms\Career\Interfaces\ResumeRepositoryInterface;
use Litecms\Career\Models\Resume;

class ResumeUserController extends BaseController
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
     * Initialize resume controller.
     *
     * @param type ResumeRepositoryInterface $resume
     *
     * @return type
     */
    public function __construct(ResumeRepositoryInterface $resume)
    {
        $this->middleware('web');
        $this->middleware('auth:web');
        $this->middleware('auth.active:web');
        $this->setupTheme(config('theme.themes.user.theme'), config('theme.themes.user.layout'));
        $this->repository = $resume;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(ResumeUserRequest $request)
    {
        $this->repository->pushCriteria(new \Lavalite\Career\Repositories\Criteria\ResumeUserCriteria());
        $resumes = $this->repository->scopeQuery(function ($query) {
            return $query->orderBy('name');
        })->paginate();

        $this->theme->prependTitle(trans('career::resume.names') . ' :: ');

        return $this->theme->of('career::user.resume.index', compact('resumes'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param Resume $resume
     *
     * @return Response
     */
    public function show(ResumeUserRequest $request, Resume $resume)
    {
        Form::populate($resume);

        return $this->theme->of('career::user.resume.show', compact('resume'))->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ResumeUserRequest $request)
    {

        $resume = $this->repository->newInstance([]);
        Form::populate($resume);

        return $this->theme->of('career::user.resume.create', compact('resume'))->render();
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ResumeUserRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $resume = $this->repository->create($attributes);

            return redirect(trans_url('/user/career/resume'))
                ->with('message', trans('messages.success.created', ['Module' => trans('career::resume.name')]))
                ->with('code', 201);

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Resume $resume
     *
     * @return Response
     */
    public function edit(ResumeUserRequest $request, Resume $resume)
    {

        Form::populate($resume);

        return $this->theme->of('career::user.resume.edit', compact('resume'))->render();
    }

    /**
     * Update the specified resource.
     *
     * @param Request $request
     * @param Resume $resume
     *
     * @return Response
     */
    public function update(ResumeUserRequest $request, Resume $resume)
    {
        try {
            $attributes = $request->all();
            $attributes['published'] = 'No';
            $this->repository->update($attributes, $resume->getRouteKey());
            
            return redirect(trans_url('/user/career/resume'))
                ->with('message', trans('messages.success.updated', ['Module' => trans('career::resume.name')]))
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
    public function destroy(ResumeUserRequest $request, Resume $resume)
    {
        try {
            $this->repository->delete($resume->getRouteKey());
            return redirect(trans_url('/user/career/resume'))
                ->with('message', trans('messages.success.deleted', ['Module' => trans('career::resume.name')]))
                ->with('code', 204);

        } catch (Exception $e) {

            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);

        }
    }
}
