<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\sController as BaseController;
use Litecms\Career\Http\Requests\ResumeAdminApiRequest;
use Litecms\Career\Interfaces\ResumeRepositoryInterface;
use Litecms\Career\Models\Resume;

/**
 * Admin API controller class.
 */
class ResumeAdminApiController extends BaseController
{
    /**
     * The authentication guard that should be used.
     *
     * @var string
     */
    protected $guard = 'admin.api';
    /**
     * Initialize resume controller.
     *
     * @param type ResumeRepositoryInterface $resume
     *
     * @return type
     */
    public function __construct(ResumeRepositoryInterface $resume)
    {
        $this->middleware('api');
        $this->middleware('jwt.auth:admin.api');
        $this->setupTheme(config('theme.themes.admin.theme'), config('theme.themes.admin.layout'));
        $this->repository = $resume;
        parent::__construct();
    }

    /**
     * Display a list of resume.
     *
     * @return json
     */
    public function index(ResumeAdminApiRequest $request)
    {
        $resumes = $this->repository
            ->setPresenter('\\Litecms\\Career\\Repositories\\Presenter\\ResumeListPresenter')
            ->scopeQuery(function ($query) {
                return $query->orderBy('id', 'DESC');
            })->all();
        $resumes['code'] = 2000;
        return response()->json($resumes)
            ->setStatusCode(200, 'INDEX_SUCCESS');

    }

    /**
     * Display resume.
     *
     * @param Request $request
     * @param Model   Resume
     *
     * @return Json
     */
    public function show(ResumeAdminApiRequest $request, Resume $resume)
    {
        $resume = $resume->presenter();
        $resume['code'] = 2001;
        return response()->json($resume)
            ->setStatusCode(200, 'SHOW_SUCCESS');

    }

    /**
     * Show the form for creating a new resume.
     *
     * @param Request $request
     *
     * @return json
     */
    public function create(ResumeAdminApiRequest $request, Resume $resume)
    {
        $resume = $resume->presenter();
        $resume['code'] = 2002;
        return response()->json($resume)
            ->setStatusCode(200, 'CREATE_SUCCESS');

    }

    /**
     * Create new resume.
     *
     * @param Request $request
     *
     * @return json
     */
    public function store(ResumeAdminApiRequest $request)
    {
        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id('admin.api');
            $resume = $this->repository->create($attributes);
            $resume = $resume->presenter();
            $resume['code'] = 2004;

            return response()->json($resume)
                ->setStatusCode(201, 'STORE_SUCCESS');
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4004,
            ])->setStatusCode(400, 'STORE_ERROR');

        }
    }

    /**
     * Show resume for editing.
     *
     * @param Request $request
     * @param Model   $resume
     *
     * @return json
     */
    public function edit(ResumeAdminApiRequest $request, Resume $resume)
    {
        $resume = $resume->presenter();
        $resume['code'] = 2003;
        return response()->json($resume)
            ->setStatusCode(200, 'EDIT_SUCCESS');
    }

    /**
     * Update the resume.
     *
     * @param Request $request
     * @param Model   $resume
     *
     * @return json
     */
    public function update(ResumeAdminApiRequest $request, Resume $resume)
    {
        try {

            $attributes = $request->all();

            $resume->update($attributes);
            $resume = $resume->presenter();
            $resume['code'] = 2005;

            return response()->json($resume)
                ->setStatusCode(201, 'UPDATE_SUCCESS');

        } catch (Exception $e) {

            return response()->json([
                'message' => $e->getMessage(),
                'code'    => 4005,
            ])->setStatusCode(400, 'UPDATE_ERROR');

        }
    }

    /**
     * Remove the resume.
     *
     * @param Request $request
     * @param Model   $resume
     *
     * @return json
     */
    public function destroy(ResumeAdminApiRequest $request, Resume $resume)
    {

        try {

            $t = $resume->delete();

            return response()->json([
                'message' => trans('messages.success.delete', ['Module' => trans('career::resume.name')]),
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
