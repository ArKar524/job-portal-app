@extends('admin-panel.master')
@section('title')
    Jobs
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
                <div class="card my-5">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 class="card-title text-bold">Job Lists</h5>
                                <a href="{{url('employer/job/create')}}" class="btn btn-primary btn-sm float-end"><i class="fa-solid fa-plus px-1"></i>Add New</a>                                
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
                                    <th>Description</th>
                                    <th>Salary</th>
                                    <th>Post Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $index => $job)
                                
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $job->category->name }}</td>
                                        <td>{{ $job->position }}</td>
                                        <td>
                                            <textarea class="form-control" id="" readonly cols="35" rows="5">{{ $job->description }}</textarea>
                                        </td>
                                        <td>{{ $job->salary }}</td>

                                        <td>{{ $job->created_at->diffForHumans() }}</td>
                                        <td>
                                            <span class="badge
                                            @if ($job->status == 'post')
                                                badge-info
                                            @elseif($job->status == 'approve')
                                                badge-success
                                            @elseif($job->status =='decline')
                                                badge-warning
                                            @else
                                                badge-danger
                                            @endif ">
                                                @if ($job->status == 'post')
                                                    Request
                                                @elseif ($job->status == 'approve')
                                                    Approved
                                                @elseif ($job->status == 'decline')
                                                    Declined
                                                @else
                                                    Remove
                                                @endif
                                            </span>
                                        <td>
                                            <form action="{{ url('/employer/job/'.$job->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <a href="{{ url('/employer/job/'.$job->id.'/edit') }}" class="btn btn-success ">Edit</a>
                                                <button class="btn btn-danger">Delete</button>
                                                <a href="{{ url('/employer/job/'.$job->id) }}" class="btn btn-info ">Applications
                                                    <span class="badge text-bg-secondary">{{ $job->applications->count() }}</span>
                                                </a>                                                
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="card-footer">
                        {{ $posts->links()}}
                    </div> --}}
                </div>
            </div>
        </div>  
    </div>

</div>
@endsection