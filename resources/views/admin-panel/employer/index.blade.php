@extends('admin-panel.master')
@section('title','Dashboard')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if (Auth::user()->employer)
      @if (Auth::user()->employer->status == 'registered')

      @else
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
              </div><!-- /.col -->
            </div>
          </div>
        </div>      
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{ $jobCount->count() }}</h3>
  
                    <p>Jobs</p>
                  </div>
                  <div class="icon">
                    <i class="fa-solid fa-briefcase"></i>
                  </div>
                  <a href="{{ url('/employer/jobs') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                  <div class="inner">
                    {{-- <h3>{{($applicationCount)}}</h3> --}}
                    <h3>4</h3>
  
                    <p>Job Application</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>
                      @if ($jobs)
                        {{-- @foreach ($jobs as $job) --}}
                          {{$jobs}}
                        {{-- @endforeach --}}
                      @endif
                    
                    </h3>
  
                    <p>User Registrations</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>65</h3>
  
                    <p>Unique Visitors</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
  
          </div>
        </section>
      @endif
    @endif
  </div>
  
@endsection
