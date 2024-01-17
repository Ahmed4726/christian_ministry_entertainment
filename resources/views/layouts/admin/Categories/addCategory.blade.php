@extends('layouts.admin.main_admin_layout')
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
    
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.category.createCategory')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid mt-3">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <!-- general form elements -->
                        <div class="card card-primary ">
                            <div class="card-header">
                                <h3 class="card-title">All Categories</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <!-- <th scope="col" class="table_head">Name</th> -->
                                            <th scope="col" class="table_head">Title</th>
                                            <th scope="col" class="table_head">User Id</th>
                                            <th scope="col" class="table_head">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($categories as $category )
                                      <tr>
                                      <th scope="row">{{$category->id}}</th>
                                      <td class="table_head">{{$category->title}}</td>
                                      <td class="table_head">{{$category->user_id}}</td>

                                      <td><a class="btn btn-info btn-sm" href="{{route('admin.category.editCategory',$category->id)}}"><i class="fas fa-pencil-alt"></i>edit</a> <a class="btn btn-danger btn-sm" href="{{route('admin.category.deleteCategory',$category->id)}}"> <i class="fas fa-trash"></i>Delete</a></td>
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