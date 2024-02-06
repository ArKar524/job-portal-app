@extends('admin-panel.auth.master')
@section('title','Registration')
@section('content')    
    <div class="row">
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="col-md-4 my-5">
                <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">User Registration</h3>
                </div>
                <form action="/register" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text"  class="form-control @error('name')
                                is-invalid
                            @enderror" value="{{ old('name') }}" name="name" placeholder="Enter Your Name">
                            @error('name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email"  class="form-control @error('email')
                                is-invalid
                            @enderror" value="{{ old('email') }}" name="email" placeholder="Enter email">
                            @error('email')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password"  class="form-control @error('password')
                                is-invalid
                            @enderror" value="{{ old('password') }}" name="password" placeholder="Password">
                            @error('password')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                        <a href="{{ url('/') }}" class="btn btn-primary btn-block mb-2">Back To Home</a>
                        <p class="">If You Have Account. You Can Login <a href="{{ url('/login') }}">Here</a>!</p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection