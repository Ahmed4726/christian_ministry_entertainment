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
<section class="content">
            <div class="container-fluid pb-5 mb-4 pt-5">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-9">
                        <!-- Custom tabs (Charts with tabs)-->
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Cart</h3>
                            </div>
                            @if ($cartItems->isEmpty())
                             <h4 class="mx-3"><b>Your cart is empty.</b></h4>
                             @else
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" class="table_head">Title</th>
                                            <th scope="col" class="table_head">Price</th>
                                           
                                            <th scope="col" class="table_head">Quantity</th>
                                            <th scope="col-2" class="table_head">Total</th>
                                            <!-- <th scope="col" class="table_head">Sold_by</th>
                                            <th scope="col" class="table_head">SKU</th>
                                            <th scope="col" class="table_head">Category</th> -->
                                            <th scope="col" class="table_head">Actions</th>
                                            <!-- <th scope="col" class="table_head">علامات</th>
                                            <th scope="col" class="table_head">اسباب</th>
                                            <th scope="col" class="table_head">مرض</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $total=0;
                                        @endphp
                                    @foreach ($carts as $cart )
                                      <tr>
                                      <th scope="row">{{$cart->id}}</th>
                                      <td class="table_head">{{$cart->product_title}}</td>
                                      <td class="table_head">${{$cart->price}}</td>
                                        <!--                                      
                                      <form action="{{ route('cart.update', ['id => $id']) }}" method="post">
                                            @csrf
                                            @method('patch')
                                        <td class="table_head"><input type="number" value="{{$cart->quantity}}" name="quantity" min="1" class="form-control" style="width:50px ;"></td>
                                       
                                        <td><button type="submit" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Update</button></td>
                                        
                                        </form> -->
                                     
                                        
                                        <form action="{{ route('cart.update', $cart->id) }}" method="post">
                                            @csrf
                                            <td class="table_head"><input type="number" value="{{$cart->quantity}}" name="quantity" min="1"  class="form-control" style="width:50px ;"></td>
                                            <td>${{$cart->price*$cart->quantity}}</td>
                                            <td><button type="submit" class="btn btn-info btn-sm"><i class="fas fa-edit"></i>Update</button></td>
                                        </form>
                                       <td><a class="btn btn-danger btn-sm" href="{{ route('cart.delete', $cart->id) }}"> <i class="fas fa-trash" aria-hidden="true"></i>Delete</a></td>
                                      </tr>
                                      @php
                                        $total+=($cart->price*$cart->quantity);
                                        @endphp
                                      @endforeach
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>

                        <!-- /.card -->
                        <!-- right col -->
                    </section> 
                    <div class="col-md-3 mt-3">
                        <div class="card card-primary text-dark bg-light" style="max-width: 38rem;">
                        <div class="card-header text-center"><h5>Cart Total</h5></div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"><b> Subtotal</b> <span class="float-right">${{$total}}</span></p>
                                <hr>
                                <p class="card-text"><b> Total</b> <span class="float-right">${{$total}}</span></p>
                            </div>
                            <form action="{{route('checkout_page')}}" method="post" class="m-2">
                                @csrf
                                <input type="hidden" name="bill" class="form-control" value="{{$total}}">
                                <div class="text-center">
                                    <input type="submit" name="checkout" class="btn btn-primary mt-3 mb-2" value="Proceed to checkout">
                                </div>
                            </form> 
                        </div>   
                    </div>
                <!-- /.row (main row) -->
                @endif
            </div><!-- /.container-fluid -->
              
        </section>
     </div>
@endsection     