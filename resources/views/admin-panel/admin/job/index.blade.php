@extends('admin-panel.master')
@section('title')
    Jobs
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container-fluid d-flex justify-content-center align-content-center">
        <div class="col-md-12">
            @if (Session('successMsg'))
                <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
                {{ Session('successMsg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card my-5">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="card-title text-bold">Job Lists</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Position</th>                                 
                                <th>Employer</th>
                                <th>Description</th>
                                <th>Salary</th>
                                <th>Post Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Auth::user()->status == 'admin')
                                @foreach ($allJobs as $index => $allJob)
                                        
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $allJob->category->name }}</td>
                                        <td>{{ $allJob->position }}</td>
                                        <td>{{ $allJob->user->name }}</td>
                                        <td>
                                            <textarea class="form-control" id="" readonly cols="35" rows="5">{{ $allJob->description }}</textarea>
                                        </td>
                                        <td>{{ $allJob->salary }}</td>

                                        <td>{{ $allJob->created_at->diffForHumans() }}</td>
                                        <td>
                                            <span class="badge
                                            @if ($allJob->status == 'post')
                                                badge-info
                                            @elseif($allJob->status == 'approve')
                                                badge-success
                                            @elseif($allJob->status =='decline')
                                                badge-warning
                                            @else
                                                badge-danger
                                            @endif ">
                                                @if ($allJob->status == 'post')
                                                    Request
                                                @elseif ($allJob->status == 'approve')
                                                    Approved
                                                @elseif ($allJob->status == 'decline')
                                                    Declined
                                                @else
                                                    Remove
                                                @endif
                                            </span>
                                        <td>
                                            <form action="" method="POST">
                                                @csrf
                                                @if ($allJob->status == 'post')
                                                    <button formaction="{{ url('/admin/jobApprove/'.$allJob->id) }}" class="btn btn-success btn-sm">Approve</button>
                                                    <button formaction="{{ url('/admin/jobDecline/'.$allJob->id) }}" class="btn btn-warning btn-sm">Decline</button>
                                                @elseif ($allJob->status == 'approve')
                                                    <button formaction="{{ url('/admin/jobDecline/'.$allJob->id) }}" class="btn btn-warning btn-sm">Decline</button>
                                                    <button formaction="{{ url('/admin/jobRemove/'.$allJob->id) }}" class="btn btn-danger btn-sm">Remove</button>
                                                @elseif ($allJob->status == 'decline')
                                                    <button formaction="{{ url('/admin/jobApprove/'.$allJob->id) }}" class="btn btn-success btn-sm">Approve</button>
                                                    <button formaction="{{ url('/admin/jobRemove/'.$allJob->id) }}" class="btn btn-danger btn-sm">Remove</button>
                                                @else
                                                    <button formaction="{{ url('/admin/jobApprove/'.$allJob->id) }}" class="btn btn-success btn-sm">Approve</button>
                                                    <button formaction="{{ url('/admin/jobRemove/'.$allJob->id) }}" class="btn btn-danger btn-sm">Remove</button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach   
                            @endif                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>

</div>
@endsection