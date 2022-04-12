@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-inline-flex align-items-center justify-content-between w-100">
                    <p>{{ __('SMS') }}</p>
                    <a href="{{url('/stripe')}}" class="btn btn-primary ml-2">Payment</a>
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('send-sms')}}">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-12 col-lg-12 mb-2">
                                <textarea class="form-control" name="message"></textarea>
                            </div>
                            <div class="col-md-12 col-lg-12 mb-3">
                                <input type="text" class="form-control" name="phone_no">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2 w-100">Send SMS</button>
                    </form>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
