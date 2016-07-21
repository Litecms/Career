

@include('public::notifications')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="dashboard-content">
        <div class="panel panel-color panel-inverse">
            <div class="panel-heading">
                <h3 class="panel-title">{!!Trans('career::job.user_names')!!}</h3>
                <p class="panel-sub-title m-t-5 text-muted">{!!Trans('career::job.create')!!} </p>
            </div>

            <div class="panel-body">

                {!!Form::vertical_open()
                ->id('create-career-job')
                ->method('POST')
                ->class('dashboard-form')
                ->files('true')
                ->action(trans_url('user/career/job'))!!}
            @include('career::user.job.partial.entry')

                <div class=" m-t-20">
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-danger waves-effect w-md waves-light text-uppercase">Create Job</button>
                         <a href="{!!trans_url('/user/career/job')!!}" class="btn btn-sm btn-inverse waves-effect waves-float m-l-5 text-uppercase"> Cancel</a>
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
