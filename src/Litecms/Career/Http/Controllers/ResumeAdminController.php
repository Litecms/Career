<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Litecms\Career\Http\Requests\ResumeAdminRequest;
use Litecms\Career\Interfaces\ResumeRepositoryInterface;
use Litecms\Career\Models\Resume;

/**
 * Admin web controller class.
 */
class ResumeAdminController extends BaseController
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
     * Initialize resume controller.
     *
     * @param type ResumeRepositoryInterface $resume
     *
     * @return type
     */
    public function __construct(ResumeRepositoryInterface $resume)
    {
        $this->middleware('web');
        $this->middleware('auth:admin.web');
        $this->setupTheme(config('theme.themes.admin.theme'), config('theme.themes.admin.layout'));
        $this->repository = $resume;
        parent::__construct();
    }

    /**
     * Display a list of resume.
     *
     * @return Response
     */
    public function index(ResumeAdminRequest $request)
    {
        $pageLimit = $request->input('pageLimit');

        if ($request->wantsJson()) {
            $resumes = $this->repository
                ->setPresenter('\\Litecms\\Career\\Repositories\\Presenter\\ResumeListPresenter')
                ->scopeQuery(function ($query) {
                    return $query->orderBy('name');
                })->paginate($pageLimit);

            $resumes['recordsTotal'] = $resumes['meta']['pagination']['total'];
            $resumes['recordsFiltered'] = $resumes['meta']['pagination']['total'];
            $resumes['request'] = $request->all();
            return response()->json($resumes, 200);

        }

        $this->theme->prependTitle(trans('career::resume.names') . ' :: ');
        return $this->theme->of('career::admin.resume.index')->render();
    }

    /**
     * Display resume.
     *
     * @param Request $request
     * @param Model   $resume
     *
     * @return Response
     */
    public function show(ResumeAdminRequest $request, Resume $resume)
    {

        if (!$resume->exists) {
            return response()->view('career::admin.resume.new', compact('resume'));
        }

        Form::populate($resume);
        return response()->view('career::admin.resume.show', compact('resume'));
    }

    /**
     * Show the form for creating a new resume.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(ResumeAdminRequest $request)
    {

        $resume = $this->repository->newInstance([]);

        Form::populate($resume);

        return response()->view('career::admin.resume.create', compact('resume'));

    }

    /**
     * Create new resume.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(ResumeAdminRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id('admin.web');
            $resume = $this->repository->create($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('career::resume.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/career/resume/' . $resume->getRouteKey()),
            ], 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 400,
            ], 400);
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
    public function edit(ResumeAdminRequest $request, Resume $resume)
    {
        Form::populate($resume);
        return response()->view('career::admin.resume.edit', compact('resume'));
    }

    /**
     * Update the resume.
     *
     * @param Request $request
     * @param Model   $resume
     *
     * @return Response
     */
    public function update(ResumeAdminRequest $request, Resume $resume)
    {
        try {

            $attributes = $request->all();

            $resume->update($attributes);

            return response()->json([
                'message'  => trans('messages.success.updated', ['Module' => trans('career::resume.name')]),
                'code'     => 204,
                'redirect' => trans_url('/admin/career/resume/' . $resume->getRouteKey()),
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/career/resume/' . $resume->getRouteKey()),
            ], 400);

        }

    }

    /**
     * Remove the resume.
     *
     * @param Model   $resume
     *
     * @return Response
     */
    public function destroy(ResumeAdminRequest $request, Resume $resume)
    {

        try {

            $t = $resume->delete();

            return response()->json([
                'message'  => trans('messages.success.deleted', ['Module' => trans('career::resume.name')]),
                'code'     => 202,
                'redirect' => trans_url('/admin/career/resume/0'),
            ], 202);

        } catch (Exception $e) {

            return response()->json([
                'message'  => $e->getMessage(),
                'code'     => 400,
                'redirect' => trans_url('/admin/career/resume/' . $resume->getRouteKey()),
            ], 400);
        }

    }

}
