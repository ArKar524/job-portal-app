@extends('ui-display.layout.master')
@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Jobs</h4>
                <h2>Choose the perfect job!</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->

    <section class="blog-posts grid-system">
      <div class="container">
        <div class="all-blog-posts">
          <div class="row">
            <div class="col-md-4 col-xs-12">
                <form action="#">
                 <h4 style="margin-bottom: 15px">Type</h4>

                 <div>
                      <label>
                           <input type="checkbox">

                           <span>Contract (5)</span>
                      </label>
                 </div>

                 <div>
                      <label>
                           <input type="checkbox">

                           <span>Full time (5)</span>
                      </label>
                 </div>

                 <div>
                      <label>
                           <input type="checkbox">

                           <span>Internship (5)</span>
                      </label>
                 </div>

                 <br>

                 <h4 style="margin-bottom: 15px">Category</h4>
                 @foreach ($categories as $category)
                  <div>
                      <label>
                          <a class="text-dark" href="{{ url('jobs/search_by_cat/'.$category->id) }}" style="text">{{ $category->name }}</a>
                      </label>
                    </div>
                    
                 @endforeach
              

                </form>
              </div>
              <div class="col-md-8 col-xs-12">
                <div class="row">
                  @foreach ($jobs as $job )
                  <div class="col-sm-6">
                    <div class="blog-post">
                      <div class="blog-thumb">
                        <img src="{{ asset('assets/images/blog-6-720x480.jpg')}}" alt="">
                      </div>
                      <div class="down-content">
                        <span>$ {{ $job->salary }}</span>
                        <a href="{{ url('/jobDetails/'.$job->id) }}">{{ $job->name}}<h4> 
                        <p>{{ substr($job->description,0,150)}} ....</p>
                        <div class="post-options">
                          <div class="row">
                            <div class="col-lg-12">
                              <ul class="post-tags">
                                <li><i class="fa fa-bullseye"></i></li>
                                <li><a href="{{ url('/jobDetails/'.$job->id) }}">View Job</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
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


@endsection


