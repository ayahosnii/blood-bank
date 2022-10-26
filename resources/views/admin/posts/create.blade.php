@extends('admin.layouts.admin_layout')

@section('admin_content')
<div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Posts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Posts</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="card-body">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add City</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    {!!  Form::open(
                                    ['action' => 'App\Http\Controllers\PostsController@store',
                                      'method' => 'post',
                                      'enctype' => 'multipart/form-data'
                                    ])    !!}

                     @include('admin.posts.form')
                    {!! Form::close() !!}
                </div>
                <!-- /.card -->
            </div>
        </section>

@endsection
