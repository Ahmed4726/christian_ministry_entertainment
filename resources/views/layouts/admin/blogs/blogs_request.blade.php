@extends('layouts.admin.main_admin_layout')
@section('content')
<div class="content-wrapper">
<div class="content-header">
@if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-md-12">
          <h2 class="text-center pt-5">Blogs request section</h2>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
            <div class="container-fluid mt-5">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <!-- general form elements -->
                        <div class="card card-primary ">
                            <div class="card-header">
                                <h3 class="card-title">All Blog requests</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" class="table_head">Blog Title</th>
                                            <th scope="col" class="table_head">Blog description</th>
                                            <th scope="col" class="table_head">Actions</th>
                                            <!-- <th scope="col" class="table_head">علامات</th>
                                            <th scope="col" class="table_head">اسباب</th>
                                            <th scope="col" class="table_head">مرض</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($blogs as $blog )
                                      <tr>
                                      <th scope="row">{{$blog->id}}</th>
                                      <td class="table_head">{{$blog->title}}</td>
                                      <td class="table_head">{{$blog->blog_content}}</td>
                                      <form action="{{ route('blogs.accept', $blog->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                      <td><button type="submit" class="btn btn-info btn-sm" href=""><i class="fas fa-check"></i>Accept</button></form>
                                      <form action="{{ route('blogs.reject', $blog->id) }}" method="POST" class="d-inline">
                                         @csrf
                                         @method('DELETE')
                                       <button type="submit" class="btn btn-danger btn-sm" href="#"> <i class="fas fa-trash" aria-hidden="true"></i>Reject</button></form></td>
                                      </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                        <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
</div>
@endsection