<div class="box-header with-border">
    <h3 class="box-title"> Edit  {!! trans('career::resume.name') !!} [{!!$resume->name!!}] </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#career-resume-edit'  data-load-to='#career-resume-entry' data-datatable='#career-resume-list'><i class="fa fa-floppy-o"></i> Save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#career-resume-entry' data-href='{{trans_url('admin/career/resume')}}/{{$resume->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('cms.cancel') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#resume" data-toggle="tab">{!! trans('career::resume.tab.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('career-resume-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(trans_url('admin/career/resume/'. $resume->getRouteKey()))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="resume">
                @include('career::admin.resume.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>