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
          <h2 class="text-center mt-3"><b>All Orders</b></h2>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<section class="content">
            <div class="container-fluid mt-3">
                <!-- Main row -->
                <div class="row mb-5 pb-5">
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">All orders</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <!-- <th scope="col" class="table_head">Name</th> -->
                                            <th scope="col" class="table_head">User Id</th>
                                            <th scope="col" class="table_head">$Bill</th>
                                            <th scope="col" class="table_head">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($orders as $order )
                                      <tr>
                                      <th scope="row">{{$order->id}}</th>
                                      <td class="table_head">{{$order->user_id}}</td>
                                      <td class="table_head">${{$order->bill}}</td>
                                      <td class="table_head">{{$order->status}}</td>
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