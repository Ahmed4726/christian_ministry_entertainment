<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel PayPal Payment Gateway Integration Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<!-- @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif -->
    @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
    <div class="row mt-5 mb-5">
        <div class="col-10 offset-1 mt-5">
            <div class="card">
                <div class="card-header bg-primary text-center">
                    <div class="row">
                        <div class="col-md-9">
                            <h3 class="text-white">Select payment method from transaction </h3>
                        </div>
                        <div class="col-md-3">
                    @if(Auth::user())
                    <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="btn btn-danger" href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                    @endif
                    </div>
                    </div>  
                </div>
                <div class="card-body">
  
                
  
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <strong>{{ $message }}</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div>
                    <ul>
                        <li>
                            Total amount to buy membership is $50 
                        </li>
                        <li>
                            There are two payment methods available for payment, you can select one of them for payment. 
                        </li>
                        <li>
                            After successfully payment done you will redirect to homepage.
                        </li>
                        <li>
                           If you want to pay later you can, currently you can logout and explore the website without logging in. 
                        </li>
                    </ul> 
                    </div>
                    <div class="text-center">   
                        <a href="{{ route('create.payment') }}" class="btn btn-success">Pay with PayPal </a>
                        <a href="{{ route('stripe') }}" class="btn btn-warning">Pay with Stripe </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
