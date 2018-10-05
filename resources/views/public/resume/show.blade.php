            @include('career::public.resume.partial.header')

            <section class="single">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            @include('career::public.resume.partial.aside')
                        </div>
                        <div class="col-md-9 ">
                            <div class="area">
                                <div class="item">
                                    <div class="feature">
                                        <img class="img-responsive center-block" src="{!!url($resume->defaultImage('images' , 'xl'))!!}" alt="{{$resume->title}}">
                                    </div>
                                    <div class="content">
                                        <div class="row">
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="id">
                    {!! trans('career::resume.label.id') !!}
                </label><br />
                    {!! $resume['id'] !!}
            </div>
        </div>
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
                <label for="email">
                    {!! trans('career::resume.label.email') !!}
                </label><br />
                    {!! $resume['email'] !!}
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
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="slug">
                    {!! trans('career::resume.label.slug') !!}
                </label><br />
                    {!! $resume['slug'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="published">
                    {!! trans('career::resume.label.published') !!}
                </label><br />
                    {!! $resume['published'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="status">
                    {!! trans('career::resume.label.status') !!}
                </label><br />
                    {!! $resume['status'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_id">
                    {!! trans('career::resume.label.user_id') !!}
                </label><br />
                    {!! $resume['user_id'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="user_type">
                    {!! trans('career::resume.label.user_type') !!}
                </label><br />
                    {!! $resume['user_type'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="uploaded_folder">
                    {!! trans('career::resume.label.uploaded_folder') !!}
                </label><br />
                    {!! $resume['uploaded_folder'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="created_at">
                    {!! trans('career::resume.label.created_at') !!}
                </label><br />
                    {!! $resume['created_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="updated_at">
                    {!! trans('career::resume.label.updated_at') !!}
                </label><br />
                    {!! $resume['updated_at'] !!}
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class"form-group">
                <label for="deleted_at">
                    {!! trans('career::resume.label.deleted_at') !!}
                </label><br />
                    {!! $resume['deleted_at'] !!}
            </div>
        </div>
    </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('name')
                       -> label(trans('career::resume.label.name'))
                       -> placeholder(trans('career::resume.placeholder.name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('email')
                       -> label(trans('career::resume.label.email'))
                       -> placeholder(trans('career::resume.placeholder.email'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('mobile')
                       -> label(trans('career::resume.label.mobile'))
                       -> placeholder(trans('career::resume.placeholder.mobile'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('message')
                       -> label(trans('career::resume.label.message'))
                       -> placeholder(trans('career::resume.placeholder.message'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('resume')
                       -> label(trans('career::resume.label.resume'))
                       -> placeholder(trans('career::resume.placeholder.resume'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('image')
                       -> label(trans('career::resume.label.image'))
                       -> placeholder(trans('career::resume.placeholder.image'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('job_id')
                       -> label(trans('career::resume.label.job_id'))
                       -> placeholder(trans('career::resume.placeholder.job_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('published')
                    -> options(trans('career::resume.options.published'))
                    -> label(trans('career::resume.label.published'))
                    -> placeholder(trans('career::resume.placeholder.published'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                    {!! Form::select('status')
                    -> options(trans('career::resume.options.status'))
                    -> label(trans('career::resume.label.status'))
                    -> placeholder(trans('career::resume.placeholder.status'))!!}
               </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('uploaded_folder')
                       -> label(trans('career::resume.label.uploaded_folder'))
                       -> placeholder(trans('career::resume.placeholder.uploaded_folder'))!!}
                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



