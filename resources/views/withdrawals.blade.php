@extends('layouts.main_layout')
@section('content')
<div class="content-wrapper">
<div class="content-header">
@if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container">
      <div class="row mb-2">
        <div class="col-lg-12">
          <h3 class="text-center mt-5"><b>Withdrawal</b></h3>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content mb-5 pb-5">
   <div class="container">
     <!-- Main row -->
     <div class="row">
       <!-- Left col -->
       <div class="col-md-12 ">
         <!-- Custom tabs (Charts with tabs)-->
          <!-- general form elements -->
          <div class="card card-primary mb-5">
          <div class="card-header">
            <h3 class="card-title">Withdrawal Section</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form method="post" action="{{ route('withdrawal.post') }}">
    @csrf
    <div class="card-body justify-content-center">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="amount">Enter amount you want to withdraw</label>
                    <input type="number" name="amount" id="amount" class="form-control" placeholder="Enter amount" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="payment_method">Select Payment Method</label>
                    <select name="payment_method" id="payment_method" class="form-control" required>
                        <option value="stripe">Stripe</option>
                        <option value="paypal">PayPal</option>
                        <!-- Add more payment methods as needed -->
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block">Withdraw</button>
            </div>
        </div>
    </div>
</form>

            </div>
          </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
                               </div> -->
        
        </div>
        <!-- /.card -->
       <!-- right col -->
     </div>
     <!-- /.row (main row) -->
  <!-- /.container-fluid -->
   </div>
 </section>
 <!-- /.content -->
</div>

@endsection

