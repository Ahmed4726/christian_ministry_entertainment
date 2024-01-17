@extends('layouts.main_layout')
@section('content')
    <!-- Content Header (Page header) -->
    @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
    <div class="has-bg-img">
         <div class="bg-img bg-cover">
          <h1 class="text-center mx-auto text-light text-bold h1-text-size" style="padding-top:50vh;">One Stop Online Christian Shopping Mall</h1>
         </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
    <div class="container">
    <div class="row mb-5 mt-2">
        <div class="col-md-12">
            <div class="card">
             <div class="card-title text-center bg-primary font-weight-bold shop-mall">Gift card Shops</div>
                <div class="card-body">
                  <div class="row">
                  @foreach ($usersWithVendorRole as $user )
                    <div class="col-md-3 mb-4">
                      <div class="card bg-light shadow">                                   
                        <div class="card-body product_title">
                          <span class="vendor-name"> {{ $user->name }} </span><br>
                            <a href="{{route('vendor-shop',$user->id)}}" class="btn btn-outline-primary mx-3 mt-2">Shop Now</a>               
                        </div>
                      </div>
                    </div>
                  @endforeach                                                                                                                                                                                               
                </div>
              </div>
            </div>
        </div>
      </div>
     <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
             <div class="card-title text-center bg-primary font-weight-bold shop-mall">Health</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                        <a href="https://360wellnesshealth.com/" class="d-flex justify-content-center">360 Wellness Health</a>
                       <div class="text-center">
                        <a class="btn btn-outline-primary " href="https://360wellnesshealth.com/">Shop</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="http://vivaluxetherapy.com/"class="d-flex justify-content-center">Viva Lux Therapy</a>
                        <div class="text-center">  
                        <a class="btn btn-outline-primary text-center" href="https://360wellnesshealth.com/">Shop</a> 
                        </div>  
                    </div>
                    <div class="col-md-4">
                        <a href="https://www.alphahealthoutreach.org/"class="d-flex justify-content-center">Life Health Outreach</a>   
                       <div class="text-center">
                          <a class="btn btn-outline-primary" href="https://360wellnesshealth.com/">Shop</a>  
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>  
      <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
             <div class="card-title text-center bg-primary font-weight-bold shop-mall">Beauty</div>
                <div class="card-body">
                  <div class="row" >
                    <div class="col-md-12">
                        <a href="https://360wellnesshealth.com/" class="d-flex justify-content-center">Pretty Hustle</a>
                        <div class="text-center">
                        <a class="btn btn-outline-primary justify-content-center" href="https://360wellnesshealth.com/">Shop</a>
                            </div>
                        </div>
                  </div>
                </div>
            </div>
        </div>
      </div>  
      <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
             <div class="card-title text-center bg-primary font-weight-bold shop-mall">Wealth</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                        <a href="http://caminsures.com/" class="d-flex justify-content-center">CAM insures</a>
                       <div class="text-center">
                        <a class="btn btn-outline-primary " href="https://360wellnesshealth.com/">Shop</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a href="https://divineempowermentministries.com/"class="d-flex justify-content-center">Divine Empowerment</a>
                        <div class="text-center">  
                        <a class="btn btn-outline-primary text-center" href="https://360wellnesshealth.com/">Shop</a> 
                        </div>  
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>  
      <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
             <div class="card-title text-center bg-primary font-weight-bold shop-mall">Sports</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="d-flex justify-content-center">Coach Chris Tennis</a>
                       <div class="text-center">
                        <a class="btn btn-outline-primary " href="#">Shop</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a href="http://vivaluxetherapy.com/"class="d-flex justify-content-center">Coach Tom Tennis</a>
                        <div class="text-center">  
                        <a class="btn btn-outline-primary text-center" href="#">Shop</a> 
                        </div>  
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>  
      <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
             <div class="card-title text-center bg-primary font-weight-bold shop-mall">Education</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                        <a href="https://themustardseedfoun.wixsite.com/mysite" class="d-flex justify-content-center">The Mustard seed foundation</a>
                       <div class="text-center">
                        <a class="btn btn-outline-primary " href="https://360wellnesshealth.com/">Shop</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <a href="http://vivaluxetherapy.com/"class="d-flex justify-content-center">Hope Chaplains</a>
                        <div class="text-center">  
                        <a class="btn btn-outline-primary text-center" href="https://360wellnesshealth.com/">Shop</a> 
                        </div>  
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>  
      <div class="row mb-5">
        <div class="col-md-12">
            <div class="card">
             <div class="card-title text-center bg-primary font-weight-bold shop-mall">Outreach</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                        <a href="http://rockmissionary.org/" class="d-flex justify-content-center">Rock missinory ministory</a>
                       <div class="text-center">
                        <a class="btn btn-outline-primary " href="https://360wellnesshealth.com/">Shop</a>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>  
      <div class="row mb-5 pb-5">
        <div class="col-md-12">
            <div class="card">
             <div class="card-title text-center bg-primary font-weight-bold shop-mall">Entertainment</div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                        <a href="https://360wellnesshealth.com/" class="d-flex justify-content-center">Rejoice Christian Ministry and entertainment </a>
                       <div class="text-center">
                        <a class="btn btn-outline-primary " href="#">Shop</a>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>  
    </div>
  </div>   
    <!-- /.content -->

  <!-- /.content-wrapper -->
@endsection