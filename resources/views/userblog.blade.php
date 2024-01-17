@extends('layouts.main_layout')
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
        <div class="col-lg-12">
          <h3 class="text-center mt-5">Blogs section</h3>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content mb-5 pb-5">
   <div class="container">
     <!-- Main row -->
     <div class="row">
       <!-- Left col -->
       <div class="col-md-12 ">
         <!-- Custom tabs (Charts with tabs)-->
          <!-- general form elements -->
          <div class="card card-primary mb-5">
          <div class="card-header">
            <h3 class="card-title">Write your blog here</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{route('create-user_blog')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="card-body">
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                       <label for="blog_title" class="mx-1 save">Blog title
                           @error('title')
                            <code>{{ '(' . $message . ')' }}</code>
                            @enderror
                        </label>
                       <input type="text" class="form-control" id="title" placeholder="title" required name="title">
                      </div>
                  </div>
               </div>
               <div class="row mb-3">
                <div class="col-md-12">
                    <label for="blog_content">Blog description
                        @error('blog_content')
                        <code>{{ '(' . $message . ')' }}</code>
                        @enderror
                    </label>
                    <textarea class="form-control" rows="4" id="comment" placeholder=" Write blog"  name="blog_content"></textarea>
                </div>
              </div>
               <button type="submit" class="btn btn-primary mb-3 save">Submit</button>
            </div>
          </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
                               </div> -->
          </form>
        </div>
        <!-- /.card -->
       <!-- right col -->
     </div>
     <!-- /.row (main row) -->
  <!-- /.container-fluid -->
   </div>
 </section>
 <!-- /.content -->
</div>

<script>
    $(document).ready(function(){
      $('#file-selector').change(function(e){
          var fileName = e.target.files[0].name;
          $('#file-name').text(fileName);
          // alert('The file "' + fileName +  '" has been selected.');
          });
  });
</script>

@endsection

