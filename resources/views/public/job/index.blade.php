      @include('public::notifications')

        <section class="career">
            <div class="container">
                 @if(Session::has('success'))
                    <div class="col-md-12">
                        <div class = "alert alert-success">{!! Session::get('success') !!}</div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        <h1 class="main-title">
                            <small>Our Career</small>
                            Opportunities<span> For You</span>
                        </h1>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 hidden-xs text-right">
                        <img src="{!!trans_url('img/career-side-icon.png')!!}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                        @forelse($jobs as $key=>$job)
                        <div class="career-block">
                            <div class="row">
                             <?php $align = $key % 2 * 1;?>
                             @if($align)
                                <div class="col-sm-6">

                                    <div class="career-image" style="background-image: url({!!url(@$job->defaultImage('career.md','image'))!!});"></div>

                                </div>
                            @endif
                                <div class="col-sm-6">

                                    <div  class="@if($align) career-content-left @else career-content-right @endif text-center">
                                        <h2>{!!$job['title']!!} <span></span></h2>
                                        <p class="location"><i class="icon-location-pin"></i> : {!!$job['location']!!}</p>
                                        <p>{!!$job['details']!!}</p>
                                        <a href="{!!URL::to('careers/resume/job')!!}/{!!$job['slug']!!}" class="btn btn-danger btn-sm text-uppercase">Apply Now</a>
                                    </div>
                                </div>
                                @if(!$align)
                                <div class="col-sm-6">
                                   <div class="career-image" style="background-image: url({!!url(@$job->defaultImage('career.md','image'))!!});"></div>
                                </div>
                            @endif

                            </div>
                        </div>
                        @empty
                         <h3 class="m-t-40">No Openings</h3>
                        @endif



                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="blog-detail-side-category-wraper clearfix">
                            <h3>Job Openings</h3>
                            <ul>
                                <li class="{{ (Request::is('careers/job'))? 'active' : ''}}"><a href="{!!URL::to('careers/job')!!}">All</a><span class="cat-number">({!!Career::getCount()!!})</span></li>
                                @forelse(Trans('career::job.options.job_type') as $key=> $val)
                                    <li class="{{(Request::is('*careers/job/'.$key))? 'active' : ''}}"><a href="{!!URL::to('careers/job')!!}/{{$key}}">{{$val}}</a><span class="cat-number">({!!Career::getJobCount($key)!!})</span></li>
                                @empty
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
