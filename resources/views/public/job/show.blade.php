
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
                                            
                                            <label class="badge full-time">{{$job['job_type']}}</label>
                                            <h4>Company : {{$job['company']}}</h4>
                                        </div>
                                        <p class="location"><i class="ti-location-pin"></i> {{$job['location']}}</p>
                                        <ul class="tags clearfix">
                                            <li><i class="ti-money"></i> Monthly Salary : <span>{{$job['salary']}}</span></li>
                                            <li><i class="ti-calendar"></i> Post Date: {{format_date($job['created_at'])}}</li>
                                            <li><i class="ti-calendar"></i> Apply Before: {{ format_date($job['last_date']) }}</li>
                                        </ul>
                                        <div class="footer">
                                            <a href="https://mail.google.com/mail/" class="email-job-btn"><i class="fa fa-envelope"></i> Email Job</a>
                                            <ul class="share">
                                                <li><span>Share:</span></li>
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="details">
                                        <div class="row">
                                            <div class="col-md-4 col-md-push-8">
                                                <div class="apply-box mb-30">
                                                    <a href="{{ url('apply') }}/{{ $job['slug']}}" class="apply-job-btn">Apply for the job</a>
                                                    <span>Application ends in 4d 5h 3m</span>
                                                    <div class="apply-with-title">
                                                        <small>OR apply with</small>
                                                    </div>
                                                    <p>Know someone who would be perfect for  this role this role? Be a pal, let them know.</p>
                                                    <ul class="clearfix">
                                                        <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
                                                        <li><a href="#"><i class="fa fa-linkedin"></i> LinkedIn</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-md-pull-4">
                                                <div class="content">
                                                    <h4 class="title">Job Description</h4>
                                                    <p class="mb-30">{!! $job['details'] !!}</p>
                                                  @if($job['responsibilities'] != '')

                                                    <h4 class="title">Responsibilities</h4>
                                                    <ul class="mb-30">
                                                        <li>{!! $job['responsibilities'] !!}</li>
                                                    </ul>
                                                    @endif
                                                    @if($job['qualifications'] != '')
                                                    <h4 class="title">Minimum qualifications</h4>
                                                    <ul>
                                                        <li>{!! $job['qualifications'] !!} </li>
                                                    </ul>
                                                     @endif
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            

           
        </div>

        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"></span></button>
                    </div>
                    <div class="modal-body">
                        <h2>Login to Your Account</h2>
                        <div class="text-center social-links mt-20">
                            <a href="#" class="btn btn-icon btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" class="btn btn-icon btn-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" class="btn btn-icon btn-google"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            <a href="#" class="btn btn-icon btn-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <h3>OR<br><span class="login">Log in Using</span></h3>
                        </div>
                        <form action="login.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" required>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <div class="checkbox checkbox-primary checkbox-inline">
                                        <input type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label for="inlineCheckbox1"> Remember Me </label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p><a href="">Forgot password?</a></p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt20">Login</button>
                        </form>
                    </div>
                        
                    <div class="modal-footer">
                        <p><a href="#"  data-toggle="modal" data-target="#registerModal" data-dismiss="modal">Dont have an account yet?</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close"></span></button>
                    <div class="modal-body">
                        <div class="imageblock-content col-md-5 col-sm-3">
                            <div class="background-image-holder" style="background-image: url('img/register_bg.jpg');"></div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-5 col-md-push-6 col-sm-7 col-sm-push-4">
                                    <h2>Create an account</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget lectus pretium, sollicitudin urna nec.</p>
                                    <div class="text-center social-links mt-20">
                                        <a href="#" class="btn btn-icon btn-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-icon btn-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-icon btn-google"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-icon btn-linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                        <h3>OR<br><span class="login">Register Using</span></h3>
                                    </div>
                                    <form action="register.html" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter E-mail Address" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt20 mb20">Create Account</button>
                                        <p>By signing up, you agree to the <a href="">Terms of Service</a></p>
                                    </form>
                                    <div class="modal-footer">
                                        <p><a href="" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Already have account?</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/theme.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
