@include('public::notifications')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h4 class="text-dark  header-title m-t-0"> My Resumes </h4>
        </div>
        <div class="col-md-6">
            <a href="{{ trans_url('/user/career/resume/create') }}" class="btn btn-default pull-right"> {{ trans('cms.create')  }} Resume</a>
        </div>
    </div>
    <p class="text-muted m-b-25 font-13">
        Your awesome text goes here.
    </p>
    <hr>
    <div class="row">
        <div class="col-md-4 m-b-5 pull-right">
            {!!Form::open()->method('GET')!!}
            <div class="input-group">
              {!!Form::text('search')->type('search')->class('form-control')->placeholder('Search for...')->raw()!!}
              <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Search</button>
              </span>
            </div>
            {!! Form::close()!!}
        </div>
    </div>   
    
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>{!! trans('career::resume.label.name')!!}</th>
        <th>{!! trans('career::resume.label.email_id')!!}</th>
        <th>{!! trans('career::resume.label.mobile')!!}</th>
        <th>{!! trans('career::resume.label.message')!!}</th>
        <th>{!! trans('career::resume.label.resume')!!}</th>
        <th>{!! trans('career::resume.label.image')!!}</th>
        <th>{!! trans('career::resume.label.job_id')!!}</th>
                    <th width="150">{!! trans('career::resume.label.status')!!}</th>
                    <th width="150">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resumes as $resume)
                <tr>
                    <td>{{ $resume->name }}</td>
                    <td>{{ $resume->email_id }}</td>
                    <td>{{ $resume->mobile }}</td>
                    <td>{{ $resume->message }}</td>
                    <td>{{ $resume->resume }}</td>
                    <td>{{ $resume->image }}</td>
                    <td>{{ $resume->job_id }}</td>
                    <td><span class="label status-{{ $resume->status }}"> {{ $resume->status }} </span></td>
                    <td>
                        <a href="{{ trans_url('/user') }}/career/resume/{!! $resume->getRouteKey() !!}"> View </a>
                        <a href="{{ trans_url('/user') }}/career/resume/{!! $resume->getRouteKey() !!}/edit"> Edit </a>
                        <a data-action="DELETE" 
                            data-href="{{ trans_url('/user') }}/career/resume/{!! $resume->getRouteKey() !!}" 
                            href="trans_url('/user')/career/resume/{!! $resume->getRouteKey() !!}"> 
                            Delete 
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $resumes->links() }}
</div>