@extends('admin-panel.master')
@section('title')
    Categories
@endsection
@section('content')
<div class="content-wrapper">
    <div class="container">
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
                                    <h5 class="card-title text-bold">Post Lists</h5>
                                    @if (Auth::user()->status == 'admin')
                                    <a href="{{url('admin/category/create')}}" class="btn btn-primary btn-sm float-end"><i class="fa-solid fa-plus px-1"></i>Add New</a>  
                                    @endif                               
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        @if (Auth::user()->status == 'admin')                                        
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $index => $category )
                                        <tr>
                                            <td>{{ $index +1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            @if (Auth::user()->status == 'admin')
                                                <td>
                                                    <form action="{{ url('/admin/category/'.$category->id.'/delete') }}" method="POST">
                                                        @csrf
                                                        <a href="{{ url('/admin/category/'.$category->id.'/edit') }}" class="btn btn-success ">Edit</a>
                                                        <button class="btn btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            @endif
                                            
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>

</div>
@endsection