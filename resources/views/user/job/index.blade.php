@include('public::notifications')
<div class="dashboard-content">
    <div class="panel panel-color panel-inverse">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <h3 class="panel-title">
                        {!!Trans('career::job.user_names')!!}
                    </h3>
                    <p class="panel-sub-title m-t-5 text-muted">
                        {!!Trans('career::job.title')!!}
                    </p>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="row m-t-5">
                        <div class="col-xs-6 col-sm-8">
                                {!!Form::open()
                                ->method('GET')
                                ->action(URL::to('user/career/job'))!!}
                                <div class="input-group">
                                    {!!Form::text('search')->type('text')->class('form-control')->placeholder('Search for Jobs')->raw()!!}
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-danger" type="button">
                                            <i class="icon-magnifier">
                                            </i>
                                        </button>
                                    </span>
                                </div>
                                {!! Form::close()!!}
                        </div>
                        <div class="col-xs-6 col-sm-4">
                            <a class=" btn btn-success btn-block text-uppercase f-12" href="{{ trans_url('user/career/job/create') }}">
                                {{ trans('cms.create')  }} Job
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <div class="panel-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                                 <tr>
                    <th>{!! trans('career::job.label.title')!!}</th>
                    <th>{!! trans('career::job.label.job_type')!!}</th>
                    <th>{!! trans('career::job.label.location')!!}</th>
                    <th width="170">Action</th>
                </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr id="{!! $job->getRouteKey() !!}">
                             <td>{{ ucfirst($job->title) }}</td>
                             <td>{{ ucfirst($job->job_type) }}</td>
                             <td>{{ ucfirst($job->location) }}</td>
                            <td>
                                 <div class="btn-group dashboard-blog-actions text-right">
                                <a class="btn btn-icon waves-effect btn-success m-b-5" href="{{ trans_url('careers/resume/job') }}/{!!$job->getPublicKey()!!}">
                                    <i class="fa fa-eye">
                                    </i>
                                </a>
                                <a class="btn btn-icon waves-effect btn-primary m-b-5" href="{{ trans_url('/user') }}/career/job/{!! $job->getRouteKey() !!}/edit">
                                    <i class="fa fa-pencil">
                                    </i>
                                </a>
                                <a class="btn btn-icon waves-effect btn-danger" data-action="DELETE" data-href="{{ trans_url('user/career/job') }}/{!! $job->getRouteKey() !!}" data-remove="{!! $job->getRouteKey() !!}">
                                    <i class="fa fa-trash">
                                    </i>
                                </a>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $jobs->links() }}
         </div>
    </div>
