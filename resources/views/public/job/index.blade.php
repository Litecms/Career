
       @include('career::public.job.partial.header')


            <section class="content bg-grey">
                <div class="container">
                    <div class="jobs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="jobs-table">
                                    @foreach($jobs as $job)
                                    <div class="table-row">
                                        <div class="table-cells flex no-wrap">
                                            <div class="cell job-title-cell flex no-column no-wrap">
                                                <div class="cell-mobile-label">
                                                    <h6>Company Name</h6>
                                                </div>
                                                <div class="content">
                                                    <h4><a href="{{trans_url('career')}}/{{@$job['slug']}}">{{ $job['title'] }}</a></h4>
                                                    <p>Whale creative</p>
                                                </div>
                                            </div>
                                            <div class="cell job-type-cell flex no-column no-wrap">
                                                <div class="cell-mobile-label">
                                                    <h6>Type</h6>
                                                </div>
                                                <span class="badge full-time">{{ $job['job_type'] }}</span>
                                            </div>
                                            <div class="cell location-cell flex no-column no-wrap">
                                                <div class="cell-mobile-label">
                                                    <h6>Location</h6>
                                                </div>
                                                <p>{{ $job['location'] }}</p>
                                            </div>
                                            <div class="cell expired-date-cell flex no-column no-wrap">
                                                <div class="cell-mobile-label">
                                                    <h6>Expired date</h6>
                                                </div>
                                                <p>{{ format_date($job['created_at']) }}</p>
                                            </div>
                                            <div class="cell salary-cell flex no-column no-wrap">
                                                <div class="cell-mobile-label">
                                                    <h6>Salary</h6>
                                                </div>
                                                <p>{{ $job['salary'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                 @endforeach  
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>