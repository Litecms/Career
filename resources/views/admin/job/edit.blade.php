    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#job" data-toggle="tab">{!! trans('career::job.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#career-job-edit'  data-load-to='#career-job-entry' data-datatable='#career-job-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#career-job-entry' data-href='{{guard_url('career/job')}}/{{$job->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('career-job-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('career/job/'. $job->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="job">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('career::job.name') !!} [{!!$job->title!!}] </div>
                @include('career::admin.job.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>