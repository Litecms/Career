<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="text-dark  header-title m-t-0"> {!! $resume['name'] !!} </h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ trans_url('careers') }}" class="btn btn-default pull-right"> Back</a>
                    </div>
                </div>
                <hr/>

                <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="name">
                    {!! trans('career::resume.label.name') !!}
                </label><br />
                    {!! $resume['name'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="email_id">
                    {!! trans('career::resume.label.email_id') !!}
                </label><br />
                    {!! $resume['email_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="mobile">
                    {!! trans('career::resume.label.mobile') !!}
                </label><br />
                    {!! $resume['mobile'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="message">
                    {!! trans('career::resume.label.message') !!}
                </label><br />
                    {!! $resume['message'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="resume">
                    {!! trans('career::resume.label.resume') !!}
                </label><br />
                    {!! $resume['resume'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="image">
                    {!! trans('career::resume.label.image') !!}
                </label><br />
                    {!! $resume['image'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="job_id">
                    {!! trans('career::resume.label.job_id') !!}
                </label><br />
                    {!! $resume['job_id'] !!}
            </div>
        </div>
    </div>
            </div>  
        </div>  
        <div class="col-md-4">
            @include('career::public.resume.aside')
        </div>

    </div>
</div>