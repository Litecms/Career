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

    protected function store(Request $request) { 
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        try {

            $attributes = $request->all();
            // $target_dir = storage_path('uploads/');
            //  $target_file = $target_dir . basename($_FILES["resume"]["name"]); 
            // move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file);
            $resume = $this->repository->create($attributes);
            return redirect(trans_url('/careers'));
        }
           catch (Exception $e) {
               redirect()->back()->withInput()->with('message', $e->getMessage())->with('code', 400);
        }
    }

}
