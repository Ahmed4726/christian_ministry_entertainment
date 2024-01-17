<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registeration page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('../../plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
@if(session('error'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
<body class="hold-transition register-page">
<!-- <div class="content-header">
        @if (Session::has('info'))
        <div class="row bg-primary p-2">
            <div class="col-md-12">
                <p class="text-light">
                    {{ Session::get('info') }}
                </p>
            </div>
        </div>
        @endif
</div>         -->

<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ route('register') }}" class="h1"><b>Register</b> Now!</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{route('store.user')}}" method="post">
        @csrf
      <div class="row pt-1">
            <div class="col-md-6">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Full name" name="name" id="name" required>
                </div>
            </div>   
            <div class="col-md-6">
                    <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" required>
                    
                    </div>
            </div>
      </div>   
        <div class="row pt-1">
            <div class="col-md-6">
                <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                
                </div>
            </div>
            <div class="col-md-6">   
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Retype password" name="password" required>
                    
                    </div>
            </div>
        </div>
        <div class="row pt-1">
            <div class="col-md-6">
                <div class="input-group mb-3">
                <input type="text" class="form-control" id="address" placeholder="Street address" name="address" required>
              
                </div>
            </div>
            <div class="col-md-6">   
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" id="city" placeholder="City" name="city" required>
                   
                    </div>
            </div>
        </div> 
        <div class="row pt-1">
            <div class="col-md-6">
                <div class="input-group mb-3">
                <input type="text" class="form-control" id="state" placeholder="State" name="state" required>
               
                </div>
            </div>
            <div class="col-md-6">   
                    <div class="input-group mb-3">
                    <input type="number" class="form-control" id="zip" placeholder="Zipcode" name="zip" required>
                   
                    </div>
            </div>
        </div> 
        <div class="row pt-1">
            <div class="col-md-6">
                <div class="input-group mb-3">
                <input type="tel" class="form-control" id="phone" placeholder="Phone no." name="phone" required>
              
                </div>
            </div>
            <div class="col-md-6">   
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" id="referral" placeholder="Referral code" name="referral_code">
                  
                    </div>
            </div>

        </div> 
        <div class="row pt-1">
            <div class="col-md-6">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Enter stripe ID" name="stripe_ID" id="stripeid" >
                </div>
            </div>   
            <div class="col-md-6">
                    <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Enter paypal email" name="paypal_email">
                    </div>
            </div>
      </div> 
        <div class="row pt-1">
            <div class="col-md-6">
                <div class="input-group mb-3">
                <input type="text" class="form-control" id="website" placeholder="Website" name="website" required>
               
                </div>
            </div>
            <div class="col-md-6">   
                    <div class="input-group mb-3">
                    <!-- <input type="text" class="form-control" placeholder="User"> -->
                    <select class="custom-select rounded-0" id="exampleSelectRounded0" name="role">
                                                @foreach ($roles as $role)
                                                <option>{{$role->title}}</option>
                                                @endforeach
                    </select>
                    <!-- <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div> -->
                    </div>
            </div>
        </div>         
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{ asset('../../plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../../dist/js/adminlte.min.js') }}"></script>

</body>
</html>