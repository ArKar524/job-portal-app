@extends('admin-panel.auth.master')
@section('title','Registration')
@section('content')    
    <div class="row">
        <div class="container d-flex justify-content-center align-items-center" >
            <div class="col-md-8 my-5">
                @if (Session('successMsg'))
                    <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
                        {{ Session('successMsg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Rercuiter Registration</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/employerRegisterStore" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" required class="form-control @error('name')
                            is-invalid
                            @enderror" value="{{ old('name')}}" name="name" placeholder="Enter Your name">
                            @error('name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div> <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" required class="form-control @error('email')
                            is-invalid
                            @enderror" value="{{ old('email')}}" name="email" placeholder="Enter Your email">
                            @error('email')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" required class="form-control @error('password')
                            is-invalid
                            @enderror" value="{{ old('password')}}" name="password" placeholder="Enter password">
                            @error('password')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">image</label>
                            <input type="file" name="image" class="form-control  @error('image')
                                is-invalid
                            @enderror" value="{{ old('image')}}">
                            @error('image')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" required class="form-control @error('website')
                            is-invalid
                            @enderror" value="{{ old('website')}}" name="website" placeholder="Enter Website">
                            @error('website')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" required class="form-control @error('address')
                            is-invalid
                            @enderror" value="{{ old('address')}}" name="address" placeholder="Enter address">
                            @error('address')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description')
                            is-invalid
                            @enderror" >{{ old('description')}}</textarea>
                            @error('description')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block mb-2">Register</button>
                            <a href="{{ url('/') }}" class="btn btn-primary btn-block mb-2">Back To Home</a>
                            <p class="">If You Have Account. You Can Login <a href="{{ url('/employerLogin') }}">Here</a>!</p>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection