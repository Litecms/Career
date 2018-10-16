            <div class='row'>
                <div class='col-md-6 col-sm-6'>
                       {!! Form::text('title')
                       -> label(trans('career::job.label.title'))
                       ->required()
                       -> placeholder(trans('career::job.placeholder.title'))!!}
                </div>
                <div class='col-md-6 col-sm-6'>
                       {!! Form::text('company')
                       -> label(trans('career::job.label.company'))
                       ->required()
                       -> placeholder(trans('career::job.placeholder.company'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                            {!! Form::select('job_type')
                            -> options(trans('career::job.options.job_type'))
                            -> label(trans('career::job.label.job_type'))
                            -> placeholder(trans('career::job.placeholder.job_type'))!!}
                  </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('location')
                       -> label(trans('career::job.label.location'))
                       -> placeholder(trans('career::job.placeholder.location'))!!}
                </div>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('salary')
                       -> label(trans('career::job.label.salary'))
                       ->required()
                       -> placeholder(trans('career::job.placeholder.salary'))!!}
                </div>
                        
                 <div class='col-md-4 col-sm-6'>
                      {!! Form::date('last_date')
                      -> label(trans('career::job.label.last_date'))
                      ->required()
                      -> placeholder(trans('career::job.placeholder.last_date'))!!}
                 </div>
                

                <div class='col-md-12 col-sm-12'>
                       {!! Form::textarea('details')
                       -> label(trans('career::job.label.details'))
                       ->rows(5)
                       ->required()
                       -> placeholder(trans('career::job.placeholder.details'))!!}
                </div>
                <div class='col-md-6 col-sm-6'>
                       {!! Form::textarea('responsibilities')
                       -> label(trans('career::job.label.responsibilities'))
                       ->rows(5)
                       ->addClass('html-editor')
                       -> placeholder(trans('career::job.placeholder.responsibilities'))!!}
                </div>
                <div class='col-md-6 col-sm-6'>
                       {!! Form::textarea('qualifications')
                       -> label(trans('career::job.label.qualifications'))
                       ->addClass('html-editor')
                       -> placeholder(trans('career::job.placeholder.qualifications'))
                       ->rows(5)!!}
                </div>
              <div class='col-md-12 col-sm-12'>
                    <div class="form-group">
                        <label for="images" class="control-label col-lg-12 col-sm-12 text-left">
                         {{trans('career::job.label.image') }}
                         </label>
                        <div class='col-lg-12 col-sm-12'>
                            {!! $job->files('image', 10)
                            ->mime(config('filer.image_extensions'))
                            ->url($job->getUploadUrl('image'))
                            ->dropzone()!!}
                        </div>
                        <div class='col-lg-7 col-sm-12'>
                            {!! $job->files('image')
                             ->editor()!!}
                        </div>
                    </div>
                </div>
                
            </div>