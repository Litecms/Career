<?php

namespace Litecms\Career\Http\Controllers;

use App\Http\Controllers\PublicController as BaseController;
use Litecms\Career\Interfaces\ResumeRepositoryInterface;
use Illuminate\Http\Request;

class ResumePublicController extends BaseController
{
    // use ResumeWorkflow;

    /**
     * Constructor.
     *
     * @param type \Litecms\Resume\Interfaces\ResumeRepositoryInterface $resume
     *
     * @return type
     */
    public function __construct(ResumeRepositoryInterface $resume)
    {
        $this->repository = $resume;
        parent::__construct();
    }

    /**
     * Show resume's list.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function index()
    {
        $resumes = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->setMetaTitle(trans('career::resume.names'))
            ->view('career::public.resume.index')
            ->data(compact('resumes'))
            ->output();
    }

    /**
     * Show resume's list based on a type.
     *
     * @param string $slug
     *
     * @return response
     */
    protected function list($type = null)
    {
        $resumes = $this->repository
        ->pushCriteria(app('Litepie\Repository\Criteria\RequestCriteria'))
        ->scopeQuery(function($query){
            return $query->orderBy('id','DESC');
        })->paginate();


        return $this->response->setMetaTitle(trans('career::resume.names'))
            ->view('career::public.resume.index')
            ->data(compact('resumes'))
            ->output();
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
        $resume = $this->repository->scopeQuery(function($query) use ($slug) {
            return $query->orderBy('id','DESC')
                         ->where('slug', $slug);
        })->first(['*']);

        return $this->response->setMetaTitle($$resume->name . trans('career::resume.name'))
            ->view('career::public.resume.show')
            ->data(compact('resume'))
            ->output();
    }

     protected function upload(Request $request)
        {
               try
                   {
                       $attributes = $request->all();
                       $resume = $this->repository->create($attributes);
                       return redirect(trans_url('/careers'));
                   }
               catch (Exception $e) {
                   redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
               }
       }

}
