@extends('admin-panel.master')
@section('title','Payment Panel')
@section('content')
<div class="content-wrapper">
    <div class="container">
        @if (Auth::user()->employer)
            @if (Auth::user()->employer->status == 'registered')
            <div class="row">
                <div class="col-md-8 my-5">
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Payment Comfirm Form</h3>
                    </div>
                    <form action="/employer/payment/confirm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label class="input-group-text" for="inputGroupFile01">Image</label>
                                <input type="file" name="image" class="form-control  @error('image')
                                is-invaild
                                @enderror" value="{{ old('image') }}" id="inputGroupFile01">
                              
                                @error('image')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="transaction_number">Transaction Number</label>
                                <input type="text" required class="form-control @error('transaction_number')
                                    is-invaild
                                @enderror" value="{{ old('transaction_number') }}" name="transaction_number" placeholder="Enter Transaction Number ...">
                                @error('image')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>                           
                        </div>
                        {{-- @foreach ($payments as $payment ) --}}
                            @if ($isExit == null)
                            
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                            @endif
                        {{-- @endforeach --}}
                        
                    </form>
                    </div>
                </div>
            </div>    
            @endif
        @else
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
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Image</th>
                                        <th>Transaction Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $index => $payment )
                                        <tr>
                                            <td>{{ $index +1 }}</td>
                                            <td>
                                                <img src="{{ asset('storage/payment-images/'.$payment->image) }}" alt="" width="100px">
                                            </td>
                                            
                                            <td>{{ $payment->transaction_number }}</td>
                                            <td>
                                                <span class="badge
                                                @if ($payment->status == 'request')
                                                    badge-info
                                                @elseif($payment->status == 'confirm')
                                                    badge-success
                                                @elseif($payment->status =='decline')
                                                    badge-warning
                                                @else
                                                    badge-danger
                                                @endif ">
                                                    @if ($payment->status == 'request')
                                                        Request
                                                    @elseif ($payment->status == 'confirm')
                                                        Approved
                                                    @elseif ($payment->status == 'decline')
                                                        Declined
                                                    @endif
                                                </span>
                                            </td>
                                            @if ($payment->status == 'confirm')

                                            @else
                                                <td>
                                                    <form action="{{ url('/admin/payment/'.$payment->id.'/decline') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="employer_id" value="{{ $payment->employer_id }}">
                                                        <button formaction="{{ url('/admin/payment/'.$payment->id.'/confirm') }}" class="btn btn-success ">Approve</button>
                                                        <button class="btn btn-danger">Decline</button>
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
        @endif

    </div>
</div>
@endsection