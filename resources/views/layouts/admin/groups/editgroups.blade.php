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
                            <h3 class="card-title">Edit Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('admin.product.updateProduct',$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Title</label>
                                            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{$product->title}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Product price ($)</label>
                                            <input type="text" class="form-control" id="price" placeholder="Enter price" name="price" value="{{$product->price}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                <label class="custom-file-label" for="exampleInputFile" id="filename">Choose file</label>
                                                    <input type="file" class="custom-file-input" id="file" name="image_name"  onchange="displayFileName()" value="{{$product->image_name}}">
                                                    <img src="{{ asset('/public/images/' . $product->image_name)}}" width="50px" height="50px" alt="product-image"/>
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
                                            <input type="text" class="form-control" id="sold_by" placeholder="Sold_by" name="sold_by" value="{{$product->sold_by}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="name">Product SKU</label>
                                            <input type="text" class="form-control" id="SKU" placeholder="Enter SKU" name="SKU" value="{{$product->SKU}}">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Select Category</label>
                                            <select class="custom-select rounded-0" id="exampleSelectRounded0" name="category" value="{{$product->category->title}}">
                                                @foreach ($categories as $category)
                                                <option>{{$category->title}}</option>
                                                @endforeach
                                        </select>
                                        </div>
                                    </div>
                                 
                                </div>
                                <!-- <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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