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
                            <h3 class="card-title">Add Group</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.group.createGroup')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Group Title</label>
                                            <input type="text" class="form-control"  placeholder="Enter group title" name="group_title">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Upload Group image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file" name="group_image"  onchange="displayFileName()" multiple>
                                                    <label class="custom-file-label" for="exampleInputFile" id="filename">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Group description</label>
                                            <textarea class="form-control" placeholder="Enter group description" name="description"></textarea>
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
                                <h3 class="card-title">All Groups</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <!-- <th scope="col" class="table_head">Name</th> -->
                                            <th scope="col" class="table_head">Group Title</th>
                                            <th scope="col" class="table_head">Group image</th>
                                            <th scope="col" class="table_head">Group description</th>
                                            <th scope="col" class="table_head">Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($groups as $group )
                                      <tr>
                                      <th scope="row">{{$group->id}}</th>
                                      <td class="table_head">{{$group->group_title}}</td>
                                      <td class="table_head">   <img width="30%" class="img-circle" src="{{ asset('storage/images'.$group->group_image) }}"></td>
                                      <td class="table_head">{{$group->description}}</td>
                                      <td><a class="btn btn-info btn-sm" href="#"><i class="fas fa-pencil-alt"></i>edit</a> <a class="btn btn-danger btn-sm" href="#"> <i class="fas fa-trash"></i>Delete</a></td>
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
<script>
    function displayFileName() {
        const fileInput = document.getElementById('file');
        const filenameDisplay = document.getElementById('filename');
        filenameDisplay.innerText = fileInput.files[0].name;
    }
</script> 
@endsection