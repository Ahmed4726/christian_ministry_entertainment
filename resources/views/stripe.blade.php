@extends('layouts.vendors.payment_layout')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <h2 class="panel-title" >Checkout Forms</h2>
                </div>
                <div class="panel-body">
      
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                    <form id='checkout-form' method='post' action="{{ route('stripe.post') }}">   
                        @csrf             
                        <input type='hidden' name='stripeToken' id='stripe-token-id'>                              
                        <br>
                        <div id="card-element" class="form-control" ></div>
                        <button 
                            id='pay-btn'
                            class="btn btn-success mt-3"
                            type="button"
                            style="margin-top: 20px; width: 100%;padding: 7px;"
                            onclick="createToken()">PAY $50
                        </button>
                        </form>
      
                </div>
            </div>        
        </div>
    </div>
          
</div>
@endsection


