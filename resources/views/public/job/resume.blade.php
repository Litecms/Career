
                     @include('career::public.job.partial.header')


<section class="content bg-grey">
    <div class="jobs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post-wrapper">
                        <div class="header">
                            <div class="title clearfix">
                                <h3>{{$resume['title']}}</h3>
                                <label class="badge full-time">Full Time</label>
                                <h4>Company : {{$resume['company']}}</h4>
                            </div>
                            <p class="location"><i class="ti-location-pin"></i> {{$resume['location']}}</p>
                            <ul class="tags clearfix">
                                <li><i class="ti-money"></i> Monthly Salary : <span>$3000 - $5000</span></li>
                                <li><i class="ti-calendar"></i> Post Date: {{ format_date($resume['created_at']) }}</li>
                                <li><i class="ti-calendar"></i> Apply Before: {{ format_date($resume['last_date']) }}</li>
                            </ul>
                            <div class="footer">
                                <a href="#" class="email-job-btn"><i class="fa fa-envelope"></i> Email Job</a>
                                <ul class="share">
                                    <li><span>Share:</span></li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="details">
                            <div class="content">
                                <h4 class="title">Apply Now</h4>
                                {!!Form::vertical_open()
                                -> class('apply-job-form')
                                -> method('POST')
                                -> enctype('multipart/form-data')
                                ->files('true')
                                -> action('resume/upload')!!}
                                
                                <label class="control-label col-sm-3" for="name">Name</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                     {!!Form::text('name')
                                     ->placeholder('Name')
                                     ->forceValue('')
                                     ->required()
                                     ->raw()!!}
                                    </div>
                                </div>
                                <label class="control-label col-sm-3" for="email">Email</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                     {!!Form::email('email')
                                     ->placeholder('Email')
                                     ->forceValue('')
                                     ->required()
                                     ->raw()!!}
                                    </div>
                                </div>
                                <label class="control-label col-sm-3" for="address">Mobile Number</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                   {!!Form::text('mobile')
                                   ->placeholder('Mobile Number')
                                   ->forceValue('')
                                   ->required()
                                   ->raw()!!}
                                    </div>
                                </div>
                                <label class="control-label col-sm-3" for="cover_letter">Message</label>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                   {!!Form::textarea('message')
                                   ->placeholder('message')
                                   ->forceValue('')
                                   ->rows(4)
                                   ->raw()!!}
                                   </div>
                                   <input type="hidden" name="job_id" value="{{$resume->id}}">
                                </div>
                                 <label for="file" >Upload CV (We allow only .doc and .pdf file)</label>
                                  <div class="col-sm-9">
                                    <div class="form-group">
                           
                                      {!! $resume->files('resume')
                                        ->mime('.pdf','.doc')
                                        ->url($resume->getUploadUrl('resume'))
                                        ->dropzone()
                                      !!}
                                      </div>
                                     </div>
                                <div class="footer text-right">
                                <button type="submit" class="btn btn-primary">Apply Now</button>
                                </div>
                                {!!Form::close()!!}  
                            </div>
                        </div>                                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
            
