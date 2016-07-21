

      @include('public::notifications')

        <section class="career">

            <div class="container">
              <div class='m-t-5 pull-right'>
                       <a href="{{ trans_url('/user/career/job') }}" class="btn btn-danger"> {{ trans('cms.back')  }}</a>

                    </div>
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
                                        <a href="#" class="btn btn-danger btn-sm text-uppercase">Apply Now</a>
                                    </div>
                                </div>

                            </div>
                        </div>



                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                        <div class="blog-detail-side-category-wraper clearfix">
                            <h3>Job Openings</h3>
                            <ul>
                                <li class="{{ (Request::is('careers/job'))? 'active' : ''}}"><a href="#">All</a><span class="cat-number">({!!Career::getCount()!!})</span></li>
                                @forelse(Trans('career::job.options.job_type') as $key=> $val)
                                    <li class="{{(Request::is('*careers/job/'.$key))? 'active' : ''}}"><a href="#">{{$val}}</a><span class="cat-number">({!!Career::getJobCount($key)!!})</span></li>
                                @empty
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
