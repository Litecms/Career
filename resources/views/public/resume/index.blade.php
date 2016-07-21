 <section class="career">
            <div class="container">

                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                        <h1 class="main-title">
                            <small>Apply For</small>
                            {!!$job['title']!!}<span> </span>
                        </h1>
                         <div class="career-block">
                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="career-image" style="background-image: url({!!url(@$job->defaultImage('cr','image'))!!});"></div>

                                </div>

                                <div class="col-sm-6">

                                    <div  class="career-content-left text-center">
                                        <h2>{!!$job['title']!!} <span></span></h2>
                                        <p class="location"><i class="icon-location-pin"></i> : {!!$job['location']!!}</p>
                                        <p>{!!$job['details']!!}</p>
                                       <!--  <a href="#" class="btn btn-danger btn-sm text-uppercase">Apply Now</a> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                        <p>{!!$job['details']!!}</p>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs text-right">
                        <img src="{!! trans_url('img/career-side-icon.png') !!}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        {!!Form::vertical_open()
                        -> class('carrer-apply-form m-t-40')
                        -> mathod('POST')
                        -> action('careers/resume/upload')!!}

                                    {!!Form::hidden('job_id')->value($job['id'])!!}
                                    {!!Form::hidden('upload_folder')!!}
                            <div class="row">
                                <div class="col-sm-12">
                                    {!!Form::text('name')
                                    -> required()
                                    -> class('form-control')
                                    -> placeholder('Name')
                                    -> label('Name')!!}
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                  {!!Form::number('mobile')
                                    -> required()
                                    -> class('form-control')
                                    -> placeholder('Mobile No')
                                    -> label('Mobile No')!!}
                                </div>
                                <div class="col-sm-6">
                                    {!!Form::email('email_id')
                                    -> required()
                                    -> class('form-control')
                                    -> placeholder('Email')
                                    -> label('Email')!!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    {!!Form::textArea('message')
                                    -> required()
                                    -> class('form-control')
                                    -> cols('30')
                                    -> rows('10')
                                    -> placeholder('Message')
                                    -> label('Description')!!}

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="name">Upload Resume</label>
                                     {!!Filer::uploader('resume', @$resume->getUploadURL('resume'),1,'filer::upload','application/pdf')!!}
                                    {!!Filer::editor('resume', @$resume['resume'],1)!!}

                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="name">Upload Picture</label>
                                       {!!Filer::uploader('image', @$resume->getUploadURL('image'),1)!!}
                                       {!!Filer::editor('image', @$resume['image'],1)!!}

                                </div>
                            </div>

                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-danger btn-sm text-uppercase pull-right waves-effect waves-float">Apply</button>
                                </div>
                            </div>

                       {!!Form::close()!!}

                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="blog-detail-side-category-wraper clearfix">
                            <h3>Job Openings</h3>
                            <ul>
                               <li ><a href="{!!URL::to('careers/job')!!}">All</a><span class="cat-number">({!!Career::getCount()!!})</span></li>
                                @forelse(Trans('career::job.options.job_type') as $key=> $val)
                                    <li class="@if($job['job_type']==$key) active @endif"><a href="{!!URL::to('careers/job')!!}/{{$key}}">{{$val}}</a><span class="cat-number">({!!Career::getJobCount($key)!!})</span></li>
                                @empty
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
