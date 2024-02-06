@extends('ui-display.layout.master')
@section('title','profile')
 @section('content')
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
 
 <section class="blog-posts grid-system">
    <div class="container">
      <div class="all-blog-posts">
          <div class="col-md-12 col-xs-12">
            <div class="">
              @if (Auth::check())
                <p> Name : {{ Auth::user()->name }}</p>
                <p> Email : {{ Auth::user()->email }}</p>
                <p>Status : {{ Auth::user()->status }}</p>
                @if (Auth::user()->status == 'employer')
                  <a href="{{ url('/employer') }}" class="btn btn-primary mt-3"> Go To Employer Panel</a>
                @endif
                @if (Session('successMsg'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session('successMsg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                @if (Auth::user()->status == 'user')
                  <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Your Applications</h3>
                    </div>
                    <form action="" method="POST">
                        @csrf
                        <div class="card-body">
                          <table class="table table-bordered table-hover table-striped">
                              <thead>
                                  <tr>
                                      <th>No</th>                                          
                                      <th>Job Category</th>
                                      <th>Job Postion</th>
                                      <th>Salary</th>
                                      <th>Expected_salary</th>
                                      <th>Apply Date</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                                @foreach ($applications as $index => $application)                        
                                  <tr>
                                      <td>{{ $index + 1 }}</td>
                                      <td>{{ $application->job->category->name }}</td>
                                      <td>{{ $application->job->position }}</td>        
                                      <td>{{ $application->job->salary }}</td>                                
                                      <td>{{ $application->expected_salary }}</td>
                                      <td>{{ $application->created_at->diffForHumans() }}</td>
                                      <td>
                                          <span class="badge
                                          @if ($application->status == 'pending')
                                              badge-info
                                          @elseif($application->status == 'accepted')
                                              badge-success
                                          @elseif($application->status =='decline')
                                              badge-warning
                                          @elseif ($application->status == 'unApplied')
                                              badge-danger
                                          @endif ">
                                              @if ($application->status == 'pending')
                                                  Request
                                              @elseif ($application->status == 'accepted')
                                                  Approved
                                              @elseif ($application->status == 'decline')
                                                  Declined
                                              @elseif ($application->status == 'unApplied')
                                                  Deleted
                                              @endif
                                          </span>
                                      </td>
                                      <td>
                                          <form action="" method="POST">
                                            @csrf @method("DELETE")
                                            @if ($application->status == 'pending')
                                                <button formaction="{{ url('/job-application/'.$application->id) }}" class="btn btn-warning btn-sm">Delete</button>
                                            @elseif ($application->status == 'accepted' OR $application->status == 'decline')           
                                              <button onclick="info('{{ $application->interviewInfo ? $application->interviewInfo->description : '' }}');" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                                                Interview Info
                                              </button>
                                            @endif                                    
                                          </form>
                                      </td>
                                    </tr>
                                  @endforeach
                                </tbody>

                              </table>
                          </div>
                        </form>
                    </div>
                @endif
              @endif 
            </div>


                Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum magni ad labore obcaecati modi, placeat eum suscipit cum corporis cumque eos rerum consequuntur at, quidem vel laboriosam, assumenda aliquam? Sit?Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus aliquam harum ratione aut aspernatur ipsa illo! Quaerat, consequuntur cumque. Ratione delectus repudiandae laudantium aspernatur omnis suscipit id ad alias quae?
          </div>

        </div>
    </div>
  </section>   
  {{-- interviewInformation  --}}
 <div class="modal fade my-5" id="modal-primary" style="display: none;" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content bg-primary">
        <div class="modal-header">
          <h4 class="modal-title">Interview Info</h4>
          </div>
          <div class="modal-body">
              <label for="description">Description</label>
              <textarea name="description" readonly id="showInfo" class="form-control " required cols="30" rows="10"></textarea>
          </div>
          <div class="modal-footer float-end">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          </div>        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div> 
@endsection
@section('script')
<script>
  function info($info){
    var showInfo = document.getElementById('showInfo')
    showInfo.value = $info

    console.log($info)
   }
</script>
@endsection