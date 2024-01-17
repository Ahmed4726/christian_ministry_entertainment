@extends('layouts.admin.main_admin_layout')
@section('content')
<div class="content-wrapper">

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
                                <h3 class="card-title">All Users</h3>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <!-- <th scope="col" class="table_head">Name</th> -->
                                            <th scope="col" class="table_head">Name</th>
                                            <th scope="col" class="table_head">Email</th>
                                            <th scope="col" class="table_head">Role</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($users as $user )
                                      <tr>
                                      <th scope="row">{{$user->id}}</th>  
                                      <th scope="table_head">{{$user->name}}</th>
                                      <td class="table_head">{{$user->email}}</td>
                                      <td class="table_head">{{$user->role->title}}</td>
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