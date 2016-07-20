<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.view') }}   {!! trans('career::resume.name') !!}  [{!! $resume->name !!}]  </h3>
    <div class="box-tools pull-right">
       <!--  <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#career-resume-entry' data-href='{{trans_url('admin/career/resume/create')}}'><i class="fa fa-times-circle"></i> New</button> -->
        @if($resume->id )
        <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#career-resume-entry' data-href='{{ trans_url('/admin/career/resume') }}/{{$resume->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> Edit</button>
        <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#career-resume-entry' data-datatable='#career-resume-list' data-href='{{ trans_url('/admin/career/resume') }}/{{$resume->getRouteKey()}}' >
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
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('career::resume.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('career-resume-show')
        ->method('POST')
        ->files('true')
        ->action(trans_url('admin/career/resume'))!!}
            <div class="tab-content">
                <div class="tab-pane active" id="details">
                    @include('career::admin.resume.partial.view')
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
