@extends('admin-panel.master')
@section('title','Job Creation')
@section('content')
    <div class="container d-flex justify-content-lg-center align-content-lg-center ">
        <div class="col-md-8 my-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Job Create</h3>
                    <a href="{{url('employer/jobs')}}" class="btn btn-primary btn-sm float-end"><i class="fa-solid fa-arrow-left px-1"></i>Back</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('/employer/job') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" class="form-control @error('category_id')
                                is-invalid
                            @enderror">
                                <option class="form-contorl" value="">Select Category</option>
                                @foreach ($categories as $category )
                                    <option class="form-control" value="{{ $category->id }}">{{ $category->name }}</option>                                      
                                @endforeach
                                @error('category_id')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control @error('position')
                                is-invalid
                            @enderror" value="{{ old('position') }}" name="position" placeholder="Enter Position ... ">
                            @error('position')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="number"  class="form-control @error('salary')
                                is-invalid
                            @enderror" value="{{ old('salary') }}" name="salary" placeholder="Enter Position ... ">
                            @error('salary')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control @error('description')
                                is-invalid
                            @enderror" cols="30" rows="10" placeholder="Enter Description ..."></textarea>
                            @error('description')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>                       
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-end">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>     
@endsection