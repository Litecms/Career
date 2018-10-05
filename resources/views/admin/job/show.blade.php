    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('career::job.name') !!}</a></li>
            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#career-job-entry' data-href='{{guard_url('career/job/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($job->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#career-job-entry' data-href='{{ guard_url('career/job') }}/{{$job->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#career-job-entry' data-datatable='#career-job-list' data-href='{{ guard_url('career/job') }}/{{$job->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('career-job-show')
        ->method('POST')
        ->files('true')
        ->action(guard_url('career/job'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('career::job.name') !!}  [{!! $job->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('career::admin.job.partial.entry', ['mode' => 'show'])
                </div>
            </div>
        {!! Form::close() !!}
    </div>