            @include('career::public.resume.partial.header')

            <section class="grid">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            @include('career::public.resume.partial.aside')
                        </div>
                        <div class="col-md-9 ">
                            <div class="main-area parent-border list-item">
                                @foreach($resumes as $resume)
                                <div class="item border">
                                    <div class="feature">
                                        <a href="{{trans_url('resumes')}}/{{@$resume['slug']}}">
                                            <img src="{{url($resume->defaultImage('images'))}}" class="img-responsive center-block" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h4><a href="{{trans_url('resume')}}/{{$resume['slug']}}">{{str_limit($resume['title'], 300)}}</a> 
                                        </h4>
                                        <div class="metas mt20">
                                            <div class="tag pull-left">
                                                <a href="#" class="">Seo Tips</a>
                                            </div>
                                            <div class="date-time pull-right">
                                                <span><i class="fa fa-comments"></i>{{@$resume->viewcount}}</span>
                                                <span><i class="fa fa-calendar"></i>{{format_date($resume['posted_on'])}}</span>
                                            </div>
                                        </div>
                                        <div class="divider"></div>
                                        <div class="author">
                                            <div class="avatar pull-left">
                                                {{@$resume->user->badge}}
                                            </div>
                                            <div class="actions">
                                                

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                @endforeach
                            </div>
                            <div class="pagination text-center">
                            {{ $resumes->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </section> 