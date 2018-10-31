
@include('career::public.job.partial.header')

<section class="content bg-grey">
    <div class="jobs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post-wrapper">
                        <div class="header">
                            <div class="title clearfix">
                                <h3>{{$job['title']}}</h3>
                                <label class="badge full-time">Full Time</label>
                                <h4>Company : {{$job['company']}}</h4>
                            </div>
                            <p class="location"><i class="fas fa-map-marker-alt"></i> {{$job['location']}}</p>
                            <ul class="tags clearfix">
                                <li><i class="fas fa-money-bill-wave"></i> Salary: <span>{{$job['salary']}}</span></li>
                                <li><i class="fas fa-calendar"></i> Post Date: {{ format_date($job['created_at']) }}</li>
                                <li><i class="fas fa-calendar"></i> Apply Before: {{ format_date($job['last_date']) }}</li>
                            </ul>

                        </div>
                         @include('notifications')
                        <div class="details">
                            <div class="content">
                                <h4 class="title">Apply Now</h4>

                                <form action="" method="POST" enctype="multipart/form-data">
                                <label class="control-label col-sm-3" for="name">Name</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                     @csrf
                                     {!!Form::text('name')
                                     ->placeholder('Name')
                                     ->required()
                                     ->raw()!!}
                                    </div>
                                </div>
                                <label class="control-label col-sm-3" for="email">Email</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                     {!!Form::email('email')
                                     ->placeholder('Email')
                                     ->required()
                                     ->raw()!!}
                                    </div>
                                </div>
                                <label class="control-label col-sm-3" for="address">Mobile Number</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                   {!!Form::text('mobile')
                                   ->placeholder('Mobile Number')
                                   ->required()
                                   ->raw()!!}
                                    </div>
                                </div>
                                <label class="control-label col-sm-3" for="message">Message</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                   {!!Form::textarea('message')
                                   ->placeholder('message')
                                   ->rows(4)
                                   ->raw()!!}
                                   </div>
                                   <input type="hidden" name="job_id" value="{{$job->id}}">
                                </div>
                                 <label class="control-label col-sm-3" for="file" >Upload CV <br/> (We allow only .doc and .pdf file)</label>
                                  <div class="col-sm-9">
                                    <div class="form-group">
                                      {!!Form::file('resume')
                                      ->placeholder('Upload your resume')
                                      ->forceValue('')
                                      ->rows(4)
                                      ->raw()!!}
                                      {!!Form::hidden('upload_folder')
                                      ->raw()!!}
                                      </div>
                                    </div>
                                    <div class="col-sm-9 offset-3">
                                      <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.site')}}">
                                        
                                      </div>
                                  </div>
                                <div class="footer text-right">

                                <button type="submit"
                                    class="btn btn-primary">Apply Now</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
