    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('career::resume.name') !!}</a></li>
            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#career-resume-entry' data-href='{{guard_url('career/resume/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($resume->id )
                <button type="button" class="btn btn-default btn-sm" data-action="REQUEST" data-load-to='#career-resume-entry' data-href='{{ guard_url('career/download') }}/{{$resume->getRouteKey()}}'><i class="fa fa-pencil-square"></i> Download Resume</button>
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#career-resume-entry' data-href='{{ guard_url('career/resume') }}/{{$resume->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#career-resume-entry' data-datatable='#career-resume-list' data-href='{{ guard_url('career/resume') }}/{{$resume->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('career-resume-show')
        ->method('POST')
        ->files('true')
        ->action(guard_url('career/resume'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('career::resume.name') !!}  [{!! $resume->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('career::admin.resume.partial.entry', ['mode' => 'show'])
                </div>
            </div>
        {!! Form::close() !!}
    </div>