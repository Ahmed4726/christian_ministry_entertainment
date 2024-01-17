@extends('layouts.main_layout')
@section('content')
@if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
<div class="container-fluid m-0 p-0">  
            <div class="has-bg-img">
                    <div class="bg-img-home bg-cover">
                    <h1 class="text-center mx-auto text-light text-bold h1-text-size" style="padding-top:20vh;">Rejoice!<br>Christian Ministry<br>and Entertainment</h1>
                    <p class="text-center text-light p-text-size">Welcomes and invite you to come as you are and join our community service and business Christian<br> network (CSBCN) as an individual, business, organization, professional and or entrepreneur because it<br> takes teamwork to network communities by moving ministry into the marketplace through our<br> Community Programs, Services and Events.
                        Free memberships and Paid partnerships available!</p>
                        <div class="d-flex justify-content-center home-button">
                        <a href="#" class="btn btn-primary text-light rounded-pill p-2">Youth/Adult Scholership Fund(YASF)</a>
                        <a href="#" type="button" class="btn btn-outline-light mx-3 rounded-pill p-2">$50 Network Service Fee(NSF)</a>
                        </div>
                    </div>
            </div>
</div>        
@endsection