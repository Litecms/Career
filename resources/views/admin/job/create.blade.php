<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.new') }}  {!! trans('career::job.name') !!} </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#career-job-create'  data-load-to='#career-job-entry' data-datatable='#career-job-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#career-job-entry' data-href='{{trans_url('admin/career/job/0')}}'><i class="fa fa-times-circle"></i> {{ trans('cms.close') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#info" data-toggle="tab">Job</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('career-job-create')
        ->method('POST')
        ->files('true')
        ->action(trans_url('admin/career/job'))!!}
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
        {!! Form::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
