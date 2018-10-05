    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#resume" data-toggle="tab">{!! trans('career::resume.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#career-resume-edit'  data-load-to='#career-resume-entry' data-datatable='#career-resume-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#career-resume-entry' data-href='{{guard_url('career/resume')}}/{{$resume->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('career-resume-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('career/resume/'. $resume->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="resume">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('career::resume.name') !!} [{!!$resume->name!!}] </div>
                @include('career::admin.resume.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>