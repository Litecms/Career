            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('career::resume.label.name'))
                       -> placeholder(trans('career::resume.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('email')
                       -> label(trans('career::resume.label.email'))
                       -> placeholder(trans('career::resume.placeholder.email'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('mobile')
                       -> label(trans('career::resume.label.mobile'))
                       -> placeholder(trans('career::resume.placeholder.mobile'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('message')
                       -> label(trans('career::resume.label.message'))
                       -> placeholder(trans('career::resume.placeholder.message'))!!}
                </div>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('job_id')
                       -> label(trans('career::resume.label.job_id'))
                       -> placeholder(trans('career::resume.placeholder.job_id'))!!}
                </div>
               <div class='col-md-12 col-sm-12'>
                    <div class="form-group">
                        <label for="files" class="control-label col-lg-12 col-sm-12 text-left">
                         {{trans('career::resume.label.resume') }}
                         </label>
                        <div class='col-lg-12 col-sm-12'>
                            {!! $resume->files('resume')
                            ->mime(config('filer.allowed_extensions'))
                            ->url($resume->getUploadUrl('resume'))
                            ->dropzone()!!}
                        </div>
                        <div class='col-lg-7 col-sm-12'>
                            {!! $resume->files('resume')
                             ->editor()!!}
                        </div>
                    </div>
                </div>
                
               

                

                

                
                
            </div>