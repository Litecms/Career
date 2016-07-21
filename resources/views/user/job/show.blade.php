@include('public::notifications')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="dashboard-content">
        <div class="panel panel-color panel-inverse" id="{!! $job->getRouteKey() !!}">
            <div class="panel-heading">
                <h3 class="panel-title"><span>Job</span> {!! $job['title'] !!}</h3>
                <p class="panel-sub-title m-t-5 text-muted">Sub title goes here with small font</p>
            </div>



                    <div class='m-t-5 pull-right'>
                       <a href="{{ trans_url('/user/career/job') }}" class="btn btn-default"> {{ trans('cms.back')  }}</a>
                       <a href="{{ trans_url('/user/career/job') }}/{{ $job->getRouteKey() }}/edit" class="btn btn-success"> {{ trans('cms.edit')  }}</a>
                         <a class="btn btn-icon waves-effect btn-danger" data-action="DELETE" data-href="{{ trans_url('user/career/job') }}/{!! $job->getRouteKey() !!}" data-remove="{!! $job->getRouteKey() !!}">
                                  {{trans('cms.delete')  }}
                                </a>

                    </div>


<div class="m-t-20 panel-body">



        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="title">
                    {!! trans('career::job.label.title') !!}
                </label><br />
                    {!! $job['title'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="job_type">
                    {!! trans('career::job.label.job_type') !!}
                </label><br />
                    {!! $job['job_type'] !!}
            </div>
        </div>
        <div class="m-b-25  col-md-4 col-sm-6">
            <div class"form-group">
                <label for="location">
                    {!! trans('career::job.label.location') !!}
                </label><br />
                    {!! $job['location'] !!}
            </div>
        </div>
         <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="details">
                    {!! trans('Image') !!}
                </label><br />
                    @if(!empty($job['image']))
                    <img src="{!!url($job->defaultImage('cr','image'))!!}" class="img-responsive">
                    @endif
            </div>
        </div>

        <div class="col-md-8 col-sm-6">
            <div class"form-group">
                <label for="details">
                    {!! trans('career::job.label.details') !!}
                </label><br />
                    {!! $job['details'] !!}
            </div>
        </div>


</div>
</div>
</div>
</div>
