<div class="box-header with-border">
    <h3 class="box-title"> Edit  {!! trans('career::job.name') !!} [{!!$job->title!!}] </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#career-job-edit'  data-load-to='#career-job-entry' data-datatable='#career-job-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#career-job-entry' data-href='{{trans_url('admin/career/job')}}/{{$job->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('cms.cancel') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#info" data-toggle="tab">{!! trans('career::job.tab.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('career-job-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(trans_url('admin/career/job/'. $job->getRouteKey()))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="info">
                @include('career::admin.job.partial.entry')
                 <div class='col-md-6 col-sm-12'>
                    <label>Image</label>
                     {!!Filer::uploader('image',@$job->getUploadURL('image'),1)!!}
                      {!!Filer::editor('image',@$job['image'],1)!!}
                </div>
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
