@extends('admin-panel.master')
@section('title','Job Creation')
@section('content')
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 my-5">
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Job Edit</h3>
                <a href="{{url('employer/jobs')}}" class="btn btn-primary btn-sm float-end"><i class="fa-solid fa-arrow-left px-1"></i>Back</a>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('employer/job/'.$job->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control">
                            <option class="form-contorl" value="">Select Category</option>
                            @foreach ($categories as $category )
                            <option class="form-control" {{ $job->category_id == $category->id  ? 'selected' : ''}}  value="{{ $category->id }}">{{ $category->name }}</option>                                      
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Position</label>
                        <input type="text" value="{{ $job->position }}" required class="form-control" name="position" placeholder="Enter Position ... ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Salary</label>
                        <input type="number" required class="form-control" value="{{ $job->salary }}" name="salary" placeholder="Enter Position ... ">
                    </div>
                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Enter Description ...">{{ $job->description }}</textarea>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
        <div class="col-md-2"></div>
        </div>
    </div>     
@endsection