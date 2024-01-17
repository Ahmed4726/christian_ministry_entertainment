@extends('layouts.vendors.payment_layout')
@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h1 class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent transform -rotate-2">Make A Payment</h1>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
                <div class="card">
                    <div class="card-body text-center">
                <a href="{{ route('make.payment') }}" class="btn btn-primary">Pay with Paypal</a>
                </div>    
            </div>

        </div>
    </div>
@endsection
