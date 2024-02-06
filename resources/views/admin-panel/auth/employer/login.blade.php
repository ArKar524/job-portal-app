@extends('admin-panel.auth.master')
@section('title','Login')
@section('content')
  <div class="container-fluid">
    
    <div class="row">
      <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="col-md-4 my-5">
              @if (Session('errorMsg'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ Session('errorMsg') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if (Session('successMsg'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ Session('successMsg') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
            <div class="card card-success">           
            <div class="card-header">
                <h3 class="card-title">Rercuiter Login</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="/employerLoginStore" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" required class="form-control @error('email')
                        is-invalid
                      @enderror" name="email" placeholder="Enter email">
                      @error('email')
                        <span class="text-danger"><small>{{ $message }}</small></span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" required class="form-control @error('password')
                        is-invalid
                      @enderror" name="password" placeholder="Password">
                      @error('password')
                        <span class="text-danger"><small>{{ $message }}</small></span>
                      @enderror
                    </div>
                        <button type="submit" class="btn btn-primary btn-block mb-2">Login</button>
                        <a href="{{ url('/') }}" class="btn btn-primary btn-block mb-2">Back To Home</a>
                        <div class="">If You Not Have Account. You Can Register <a href="{{ url('/employerRegister') }}">Here</a>!</div>
                    </div>
                </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
