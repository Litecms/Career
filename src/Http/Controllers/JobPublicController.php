<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Litecms\Career\Interfaces\JobRepositoryInterface;
use Litecms\Career\Interfaces\ResumeRepositoryInterface;
use Illuminate\Http\Request;
use Validator;

class JobPublicController extends BaseController
{
    // use JobWorkflow;

    /**
     * Constructor.
     *
     * @param type \Litecms\Job\Interfaces\JobRepositoryInterface $job
     *
     * @return type
     */
    public function __construct(JobRepositoryInterface $job, ResumeRepositoryInterface $resume)
    {
        $this->repository = $job;
        $this->resume = $resume;
        parent::__construct();
    }

    /**
     * Show job's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $jobs = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->setMetaTitle(trans('career::job.names'))
            ->view('career::public.job.index')
            ->data(compact('jobs'))
            ->output();
    }

    /**
     * Show job.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function show(Request $request, $slug)
    {

        $job = $this->repository->scopeQuery(function($query) use ($slug) {
           return $query->orderBy('id','DESC')
                        ->where('slug', $slug);
        })->first(['*']);
        $data = $request->old();
        $this->response->theme->asset()->add('re-captcha', 'https://www.google.com/recaptcha/api.js');
        return $this->response->setMetaTitle(trans('career::job.name').' ['.$job->title.']')
             ->view('career::public.job.show')
             ->data(compact('data', 'job'))
             ->output();
    }

    protected function apply(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $attributes = $request->all();
            $resume = $this->resume->create($attributes);
            return redirect(trans_url('careers'))->withSuccess('Your resume has been send successfully!');
        } catch (Exception $e) {
            redirect()->back()->withInput()->withError($e->getMessage());
        }

    }

}
