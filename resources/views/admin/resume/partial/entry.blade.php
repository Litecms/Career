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
                       {!! Form::text('job_id')
                       -> label(trans('career::resume.label.job_id'))
                       -> forceValue(@$resume->job->title)
                       -> placeholder(trans('career::resume.placeholder.job_id'))!!}
                </div>
                <div class='col-md-4 col-sm-6'>
                       @foreach($resume->getFile('resume') as $resume)
                       <a href="{{$resume['url']}}">{{$resume['caption']}}</a>
                       @endforeach
                </div>
     </div>