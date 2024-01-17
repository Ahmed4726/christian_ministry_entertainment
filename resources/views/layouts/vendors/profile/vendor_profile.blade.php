@extends('layouts.main_layout')
@section('content')
<div class="content-wrapper">
<section class="content-header">
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
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="container">    
    <div class="row">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{ Auth::user()->name }}</h5>
            <p class="text-muted mb-1">{{ Auth::user()->role->title }}</p>
            <!-- <p class="text-muted mb-4">{{ Auth::user()->city }}</p> -->
            <div class="d-flex justify-content-center mb-2">
              <!-- <button type="button" class="btn btn-primary">Change Profile picture</button>
              <button type="button" class="btn btn-outline-primary mx-2">Message</button> -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 pb-5">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->address }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">State</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->state }}</p>
              </div>
            </div> 
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Zip Code</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->zip }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Referral code</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->referral_code }}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Website</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->website }}</p>
              </div>
            </div>
          </div>
          <div class="card-footer">
                        <a class="btn btn-info btn-sm" href="{{route('vendor.profile.edit',['id' => Auth::user()->id])}}"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <a class="btn btn-danger btn-sm" href="#"> <i class="fas fa-trash"></i> Delete</a>
                    </div>
        </div>
      </div>
    </div>
</section>

<section class="container pb-4">
  <div class="card">
    <h4 class="card-header text-center"><b>Referral Record</b></h4>
<div class="row mx-3 mt-3">
          <div class="col-md-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

          <!-- <div class="col-lg-3 col-6">
            
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
              <i class="fa fa-bar-stats" aria-hidden="true"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
          
          <div class="col-md-4 col-6">
            
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>${{$balance->balance}}</h3>
                <p>Current Balance </p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>

          <div class="col-md-4 col-6">

            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$referralUserCount}}</h3>
                <p>Referral User</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-friends"></i>
              </div>

              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
        </div>
        </div>
</section>

<div class="container pt-3">
      <!--Section: Content-->
      <section class="pb-5 mb-5">
        <div class="card">
        <h4 class="mb-3 card-header text-center pt-2"><strong>All blog posts</strong></h4>
        <div class="row">
          @foreach ($blogs as $blog )
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="card  text-center mx-3">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <!-- <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="img-fluid" /> -->
              </div>
              <div class="card-body">
                <h5 class="card-title float-none"><b>{{ $blog->title }}</b></h5>
                <p class="card-text">
                {{ $blog->blog_content }}
                </p>
                <a href="#!" class="btn btn-primary">Read</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        </div>
      </section>
</div>     
</div> 
@endsection  