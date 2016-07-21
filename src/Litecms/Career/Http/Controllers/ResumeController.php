<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Form;
use Illuminate\Http\Request;
use Litecms\Career\Interfaces\JobRepositoryInterface;
use Litecms\Career\Interfaces\ResumeRepositoryInterface;
use Session;

class ResumeController extends BaseController
{
    /**
     * Constructor.
     *
     * @param type \Litecms\Resume\Interfaces\ResumeRepositoryInterface $resume
     *
     * @return type
     */
    public function __construct(ResumeRepositoryInterface $resume, JobRepositoryInterface $job)
    {
        $this->middleware('web');
        $this->setupTheme(config('theme.themes.public.theme'), config('theme.themes.public.layout'));
        $this->repository = $resume;
        $this->job = $job;
        parent::__construct();
    }

    /**
     * Show resume's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index($slug)
    {
        $this->theme->asset()->add('dropzone', 'packages/dropzone/dropzone.css');
        $this->theme->asset()->container('footer')->add('dropzonejs', 'packages/dropzone/dropzone.js');

        $resume = $this->repository->newInstance([]);
        $job = $this->job->scopeQuery(function ($query) use ($slug) {
            return $query->orderBy('id', 'DESC')->whereSlug($slug);
        })->first(['*']);

        Form::populate($resume);

        return $this->theme->of('career::public.resume.index', compact('resume', 'job'))->render();
    }

    /**
     * Show resume.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show($slug)
    {
        $resume = $this->repository->scopeQuery(function ($query) use ($slug) {
            return $query->orderBy('id', 'DESC')
                ->where('slug', $slug);
        })->first(['*']);

        return $this->theme->of('career::public.resume.show', compact('resume'))->render();
    }

    /**
     * Show resume's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function upload(Request $request)
    {

        try {
            $attributes = $request->all();
            $attributes['user_id'] = user_id();
            $resume = $this->repository->create($attributes);

            Session::flash('success', 'Success! Your Resume uploaded successfully.');
            return redirect(trans_url('careers/job'));

        } catch (Exception $e) {
            redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }

    }
}
