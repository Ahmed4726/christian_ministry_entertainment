@extends('layouts.admin.main_admin_layout')
@section('content')
<div class="content-wrapper">
    <!-- general form elements -->
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
                            <h3 class="card-title">Add Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.product.createProduct')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Product title</label>
                                            <input type="text" class="form-control" id="name" placeholder="Enter title" name="title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="name">Product price ($)</label>
                                            <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="file" name="image_name"  onchange="displayFileName()" multiple>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Sold_by</label>
                                            <input type="text" class="form-control" id="sold_by" placeholder="Sold_by" name="sold_by">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="name">Product SKU</label>
                                            <input type="text" class="form-control" id="SKU" placeholder="Enter SKU" name="SKU">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Select Category</label>
                                            <select class="custom-select rounded-0" id="exampleSelectRounded0" name="category">
                                                @foreach ($categories as $category)
                                                <option>{{$category->title}}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>
                                 
                                </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid pb-5 mb-4 mt-3">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">All Products</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" class="table_head">Title</th>
                                            <th scope="col" class="table_head">Price</th>
                                            <th scope="col" class="table_head">Image</th>
                                            <th scope="col" class="table_head">Sold_by</th>
                                            <th scope="col" class="table_head">SKU</th>
                                            <th scope="col" class="table_head">Category</th>
                                            <th scope="col" class="table_head">Actions</th>
                                            <!-- <th scope="col" class="table_head">علامات</th>
                                            <th scope="col" class="table_head">اسباب</th>
                                            <th scope="col" class="table_head">مرض</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $product )
                                      <tr>
                                      <th scope="row">{{$product->id}}</th>
                                      <td class="table_head">{{$product->title}}</td>
                                      <td class="table_head">{{$product->price}}</td>
                                      <td class="table_head"><img src="{{ asset('dist/img/'.$product->image_name) }}" class="rounded-pill" width="40px"/></td>
                                      <td class="table_head">{{$product->sold_by}}</td>
                                      <td class="table_head">{{$product->SKU}}</td>
                                      <td class="table_head">{{$product->category->title}}</td>
                                      <td><a class="btn btn-info btn-sm" href="{{route('admin.product.editProduct',$product->id)}}"><i class="fas fa-pencil-alt"></i>edit</a> <a class="btn btn-danger btn-sm" href="{{route('admin.product.deleteProduct',$product->id)}}"> <i class="fas fa-trash"></i>Delete</a></td>
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