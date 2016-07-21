
<div class='col-md-4 col-sm-6'>
                     {!! Form::text('title')
                     -> required()
                     -> label(trans('career::job.label.title'))
                     -> placeholder(trans('career::job.placeholder.title'))!!}
              </div>

              <div class='col-md-4 col-sm-6'>
                     {!! Form::select('job_type')
                     -> required()
                     -> options(trans('career::job.options.job_type'))
                     -> label(trans('career::job.label.job_type'))
                     -> placeholder(trans('career::job.placeholder.job_type'))!!}
              </div>

              <div class='col-md-4 col-sm-6'>
                     {!! Form::text('location')
                     -> label(trans('career::job.label.location'))
                     -> placeholder(trans('career::job.placeholder.location'))!!}
              </div>

              <div class='col-md-12 col-sm-12'>
                     {!! Form::textarea('details')
                     -> addClass('html-editor')
                     -> label(trans('career::job.label.details'))
                     -> placeholder(trans('career::job.placeholder.details'))!!}
              </div>
              <div class='col-md-6 col-sm-12'>
                    <label>Image</label>
                     {!!Filer::uploader('image',@$job->getUploadURL('image'),1)!!}
                      {!!Filer::editor('image',@$job['image'],1)!!}
                </div>
{!! Form::hidden('upload_folder')!!}
