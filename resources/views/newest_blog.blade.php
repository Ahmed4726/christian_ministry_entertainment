@extends('layouts.main_layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-md-12">
            <h2 class="text-center">Blogs Section</h2>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">Published Blogs</div>

                        <div class="card-body">
                            <div class="row">
                                @foreach($blogs as $blog)
                                    <div class="col-md-4 mb-4">
                                        <div class="card bg-light shadow">
                                            <!-- <img src="{{ asset('path/to/your/image.jpg') }}" class="card-img-top" alt="Blog Image"> -->
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $blog->title }}</h5>
                                                <p class="card-text">{{ $blog->blog_content }}</p>
                                                <!-- <a href="#" class="btn btn-primary">Read More</a> -->
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
