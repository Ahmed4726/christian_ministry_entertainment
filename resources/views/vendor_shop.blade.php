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
    <div class="jumbotron jumbotron-fluid bg-primary text-white text-center">
        <div class="container">
            <h1 class="display-5">Welcome to Our Shop</h1>
            <p class="lead">Explore our amazing Gift Cards</p>
        </div>
    </div>
    <section class="content">
      <div class="container-fluid">
            <div class="row mb-5 pb-5 mt-3">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">All Products</div>

                        <div class="card-body">
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="col-md-3 mb-4">
                                        <div class="card bg-light shadow">
                                        <img src="{{asset('dist/img/'.$product->image_name)}}" class="img-fluid card-image" alt='image'/>
                                        <hr>
                                            <div class="card-body product_title">
                                                <h5 class="product_title" class="card-title">{{ $product->title }}</h5>
                                                <p class="card-text"><strong>Price: </strong>${{ $product->price }}</p>
                                                <form action="{{route('cart.add',$product->id)}}" method="Post">
                                                  @csrf
                                                  <!-- <button type="submit" class="btn btn-outline-primary px-3" style="margin-left: 4rem;">Add to Cart</button>
                                                  <input type="number" value="1" min="1" style="width:4rem; display:inline " class="form-control" name="quantity" > -->
                                                </form>
                                                <a href="{{route('show_product',$product->id)}}" class="btn btn-outline-info mt-2">View product</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>    
@endsection