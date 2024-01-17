@extends('layouts.main_layout')
@section('content')
<div class="container">
  <div class="py-5 ">  
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-3 mt-3">
              <div class="card mx-auto">
                  <div class="card-heading text-center" >
                      <div class="card-title pt-3 float-none" >Choose one of the payment methods & pay now </div>
                  </div>
                  <div class="text-center mt-3">   
                        <a href="{{ route('shop.show.paypal') }}" class="btn btn-success">Pay with PayPal</a>
                        <a href="{{ route('shop.stripe') }}" class="btn btn-info">Pay with Stripe </a>
                    </div>
                  <div class="card-body">
                      @if (Session::has('success'))
                          <div class="alert alert-success text-center">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                              <p>{{ Session::get('success') }}</p>
                          </div>
                      @endif
                  </div>
              </div>        
          </div>
          <div class="col-md-4 order-md-2 mb-5 pb-5">
                        <div class="card card-primary text-dark bg-light" style="max-width: 38rem;">
                        <div class="card-header text-center"><h5>Cart Total</h5></div>
                        <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"><b> Subtotal</b> <span class="float-right">${{ $cart->first()->subtotal }}</span></p>
                                <hr>
                                <p class="card-text"><b> Total</b> <span class="float-right">${{$cart->first()->subtotal}}</span></p>
                            </div>
                        </div>   
                    </div>
                </div> 
            </div>
        </div>
    </div>    
@endsection