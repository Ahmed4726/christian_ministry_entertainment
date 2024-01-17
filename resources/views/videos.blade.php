@extends('layouts.main_layout')
@section('content')

    <!-- Content Header (Page header) -->
          <div class="has-bg-img">
         <div class="bg-img bg-cover">
          <h1 class="text-center mx-auto text-light text-bold h1-text-size" style="padding-top:20vh;">Videos</h1>
         </div>
          </div>
  
        <div class="row p-0 m-0">
            <div class="col-md-12">
            <video width = "100%" height = "100%" class="mb-5" controls autoplay loop>
         <source src = "{{ ('/dist/video/One Voice One Choice.mp4') }}" type = "video/mp4">
            </video>
            </div>
        </div> 
 
    <!-- /.content-header -->

  <!-- /.content-wrapper -->
@endsection