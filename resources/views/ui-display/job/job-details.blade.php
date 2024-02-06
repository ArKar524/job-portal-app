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
              <h4> $ {{$job->salary}}</h4>
              <h2>{{ $job->position }}</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <!-- Banner Ends Here -->

  <section class="blog-posts grid-system">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div>
            <img src="assets/images/product-1-720x480.jpg" alt="" class="img-fluid wc-image">
          </div>

          <br>
        </div>

        <div class="col-md-12">
              <h5>
               <i class="fa fa-calendar"></i>&nbsp;&nbsp; Post Date&nbsp;&nbsp; {{ $job->created_at->format('d-m-Y- D') }}
              </h5>
          <br>
        </div>
      </div>
    </div>
  </section>
 
  <div class="section contact-us">
    <div class="container">
      <div class="sidebar-item recent-posts">
        @if (Session('errorMsg'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session('errorMsg') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif      
     
        <div class="sidebar-heading my-2">
          <h2>Posititon</h2>
        </div>

        <div class="content mt-2">
          <p class=""><bold>{{ $job->position }}</bold></p>
        </div>
        <div class="sidebar-heading">
          <h2>Description</h2>
        </div>
        <div class="content">
          <p>{{ $job->description }}</p>
        </div>
        <div class="row">
          <div class="col-sm-4 my-3">
            <div class="main-button">
              @if (Auth::check())                              
              <a href="{{ url('/job-application/'.$job->id) }}">Apply for this Job</a>
              @else
              <a href="{{ url('/register') }}">Apply for this Job</a>
              @endif
            </div>
          </div>
        </div>
      </div>   
    </div>
  </div>
@endsection


