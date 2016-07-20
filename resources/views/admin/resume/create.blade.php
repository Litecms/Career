<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.new') }}  {!! trans('career::resume.name') !!} </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#career-resume-create'  data-load-to='#career-resume-entry' data-datatable='#career-resume-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#career-resume-entry' data-href='{{trans_url('admin/career/resume/0')}}'><i class="fa fa-times-circle"></i> {{ trans('cms.close') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Resume</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('career-resume-create')
        ->method('POST')
        ->files('true')
        ->action(trans_url('admin/career/resume'))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="details">
                @include('career::admin.resume.partial.entry')
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>