@extends('layouts.main_layout')
@section('content')
<div class="content-wrapper">
@if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="has-bg-img">
         <div class="bg-img bg-cover">
          <h1 class="text-center mx-auto text-light text-bold h1-text-size" style="padding-top:40vh;">All Groups</h1>
         </div>
    </div>
    <section class="content">
      <div class="container-fluid">
            <div class="row mb-5 pb-5 mt-3">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">All Groups</div>

                        <div class="card-body">
                            <div class="row">
                  
                                    <div class="col-md-4 mb-4">
                                        <div class="card bg-light shadow">
                                            <div class="card-header"></div>
                                        <img src="#" class="card-img-top img-box img-fluid"  alt="product Image" width="50px"/>
                                        <hr>
                                            <!-- <img src="{{ asset('path/to/your/image.jpg') }}" > -->
                                            <div class="card-body product_title">
                                                <h5 class="product_title" class="card-title"></h5>
                                                <p class="card-text"><strong>Price:</strong></p>
                                                <a href="#" class="btn btn-outline-info">Join Group</a>
                                                <form action="#" method="Post">
                                                  @csrf
                                                  <input type="number" value="1" min="1" class="form-control" name="quantity" >
                                                  <button type="submit" class="btn btn-outline-primary">Add to Cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>    
@endsection