<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.view') }}   {!! trans('career::job.name') !!}  [{!! $job->title !!}]  </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-default btn-sm" data-action='NEW' data-load-to='#career-job-entry' data-href='{{trans_url('admin/career/job/create')}}'><i class="fa fa-times-circle"></i> New</button>
        @if($job->id )
         @if($job->published == 'Yes')
            <button type="button" class="btn btn-warning btn-sm" data-action="PUBLISHED" data-load-to='#career-job-entry' data-href="{{trans_url('admin/career/job/status/'. $job->getRouteKey())}}" data-value="No" data-datatable='#career-job-list'><i class="fa fa-times-circle"></i> Suspend</button>
        @else
            <button type="button" class="btn btn-success btn-sm" data-action="PUBLISHED" data-load-to='#career-job-entry' data-href="{{trans_url('admin/career/job/status/'. $job->getRouteKey())}}" data-value="Yes" data-datatable='#career-job-list'><i class="fa fa-check"></i> Published</button>
        @endif
        <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#career-job-entry' data-href='{{ trans_url('/admin/career/job') }}/{{$job->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> Edit</button>
        <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#career-job-entry' data-datatable='#career-job-list' data-href='{{ trans_url('/admin/career/job') }}/{{$job->getRouteKey()}}' >
        <i class="fa fa-times-circle"></i> Delete
        </button>
        @endif
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#info" data-toggle="tab">  {!! trans('career::job.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('career-job-show')
        ->method('POST')
        ->files('true')
        ->action(trans_url('admin/career/job'))!!}
            <div class="tab-content">
                <div class="tab-pane active" id="info">
                    @include('career::admin.job.partial.entry')
                     <div class='col-md-6 col-sm-12'>
                    <label>Image</label>

                    <img src="{!!url($job->defaultImage('sm','image'))!!}" class="img-responsive">
                </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
