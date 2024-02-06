@extends('admin-panel.master')
@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('/admin/category/store')}}" method="POST">
                    <div class="card my-5">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="card-title text-bold">Category Create</h5>
                                    <a href="{{url('admin/categories')}}" class="btn btn-primary btn-sm float-end"><i class="fa-solid fa-arrow-left px-1"></i>Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                                @csrf
                                <label for="name">Name</label>
                                <input type="text" class="form-control" required name="name" placeholder="Enter Category Name ...">
                        </div>
                        <div class="card-footer">
                            @csrf
                            <button class="btn btn-primary">Create</button>                          
                        </div>
                        {{-- <div class="card-footer">
                            {{ $posts->links()}}
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>  
    </div>

</div>
  

@endsection