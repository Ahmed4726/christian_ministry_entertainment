@extends('layouts.main_layout')
@section('content')
<div class="content-wrapper">
    <!-- general form elements -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <section class="content">
    
        <div class="container">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('client.profile.update',$user->id)}}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter title" name="name" value="{{$user->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Address</label>
                                            <input type="text" class="form-control" id="address" placeholder="Sold_by" name="address" value="{{$user->address}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="name">City</label>
                                            <input type="text" class="form-control" id="city" placeholder="Enter SKU" name="city" value="{{$user->city}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">State</label>
                                            <input type="text" class="form-control" id="state" placeholder="State" name="state" value="{{$user->state}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="name">Product SKU</label>
                                            <input type="text" class="form-control" id="zip" placeholder="Enter Zip" name="zip" value="{{$user->zip }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Phone</label>
                                            <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" value="{{$user->phone}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="name">Website</label>
                                            <input type="text" class="form-control" id="SKU" placeholder="Enter website" name="website" value="{{$user->website}}">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Stripe Id</label>
                                            <input type="text" class="form-control" id="stripe_ID" placeholder="stripe_ID" name="stripe_ID" value="{{$user->stripe_ID}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="name">Paypa email</label>
                                            <input type="text" class="form-control" id="paypal_email" placeholder="Enter paypal_email" name="paypal_email" value="{{$user->paypal_email}}">
                                        </div>
                                    </div>
                                </div> 
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection