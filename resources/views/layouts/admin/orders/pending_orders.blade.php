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
          <h2 class="text-center mt-5">All Cancelled orders</h2>
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
                                <h3 class="card-title">Cancelled orders</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <!-- <th scope="col">#</th>
                                            <th scope="col" class="table_head">Blog Title</th>
                                            <th scope="col" class="table_head">Blog description</th>
                                            <th scope="col" class="table_head">Actions</th> -->
                                            <!-- <th scope="col" class="table_head">علامات</th>
                                            <th scope="col" class="table_head">اسباب</th>
                                            <th scope="col" class="table_head">مرض</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
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