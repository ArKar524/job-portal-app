@extends('admin-panel.master')
@section('title')
    Job-Applications
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                @if (Session('successMsg'))
                    <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
                    {{ Session('successMsg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                @if (Session('errorMsg'))
                <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                    {{ Session('errorMsg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <div class="card my-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="card-title text-bold">Job Lists</h5>
                                <a href="{{url('employer/jobs')}}" class="btn btn-primary btn-sm float-end"><i class="fa-solid fa-arrow-left px-1"></i>Back</a>
                               
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Skill</th>
                                    <th>Experience</th>
                                    <th>Expected_salary</th>
                                    <th>Post Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @if ($applications)
                                    @foreach ($applications as $index => $application)  
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $application->user->name }}</td>
                                            {{-- <td>{{ $application->user->name }}</td> --}}
                                            <td>{{ $application->email }}</td>
                                            <td>
                                                <ul>
                                                        @if ($application->skill)
                                                        @for ($i = 0; $i < count($application->skill); $i++)
                                                    <li>
                                                        {{ $application->skill[$i]->skill}}
                                                    </li>

                                                        @endfor
                                                            
                                                        @endif
                                                </ul>
                                            </td>
                                            <td>
                                                <textarea class="form-control" id="" readonly cols="35" rows="5">{{ $application->experience }}</textarea>
                                            </td>
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
                                                    @csrf
                                                    @if ($application->status == 'pending')
                                                        <button formaction="{{ url('/job-application/'.$application->id.'/accept') }}" class="btn btn-success btn-sm">Accept</button>
                                                        <button formaction="{{ url('/job-application/'.$application->id.'/decline') }}" class="btn btn-warning btn-sm">Decline</button>
                                                    @elseif ($application->status == 'accepted' OR $application->status == 'decline')
                                                        <button onclick="interviewInfo({{ $application->id }})" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                                                        Interview Info
                                                        </button>
                                                    @else
                                                        
                                                    @endif
                                                   
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    Don't Have Any Applications
                                @endif
                                   
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </div>  
    </div>

</div>
{{-- interviewInformation --}}
<div class="modal fade" id="modal-primary" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-primary">
        <div class="modal-header">
            <form action="/employer/interviewInfo" method="POST">
                @csrf
                <h4 class="modal-title">Interview Info</h4>
                </div>
                <div class="modal-body">
                    <input type="hide" class="form-control" name="application_id" id="application_id">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control " required cols="30" rows="10"></textarea>
                </div>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-outline-light">Save</button>
                </div>
            </form>
          
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection
@section('script')
  function interviewInfo($id){
    document.getElementById('application_id').value = $id;
    document.getElementById('application_id').style.display = 'none';
    console.log($id);
  }
@endsection

