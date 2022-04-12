@extends('layouts.app')
@section('content')
<div class="container">  
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3">       
            <div class="card-header d-inline-flex align-items-center justify-content-between w-100">
                    <p>{{ __('Payment') }}</p>
                    <a href="{{url('/home')}}" class="btn btn-primary ml-2">Back</a>
                </div>
            <div class="panel panel-default credit-card-box">
               <div class="panel-body">
                  @if (Session::has('success'))
                  <div class="alert alert-success text-center">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                     <p>{{ Session::get('success') }}</p><br>
                  </div>
                  @endif
                  <br>
                  <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ config('sms.STRIPE_KEY') }}" id="payment-form">
                     @csrf
                     <div class='form-row row'>
                        <div class='col-xs-12 col-md-6 form-group required'>
                           <label class='control-label'>Name on Card</label> 
                           <input class='form-control' size='4' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-6 form-group required'>
                           <label class='control-label'>Card Number</label> 
                           <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                        </div>                           
                     </div>                        
                     <div class='form-row row'>
                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                           <label class='control-label'>CVC</label> 
                           <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                           <label class='control-label'>Expiration Month</label> 
                           <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                           <label class='control-label'>Expiration Year</label> 
                           <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                        </div>
                     </div>                     
                     <div class="form-row row">
                        <div class="col-xs-12">
                           <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
      
      </div>
      </div>
      </div>
      </div>
@endsection