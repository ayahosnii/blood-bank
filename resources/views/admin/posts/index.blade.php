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
                            <li class="breadcrumb-item active">Posts</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

<section class="content">
    <div class="card-body">
        <div class="col-sm-2">
        <a href="{{route('posts.create')}}" class="btn btn-block btn-primary btn-sm">Create +</a>
            @include('flash::message')

        </div>
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            @isset($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td><img src="{{asset($post->image)}}" style="width: 100px; height: 100px"></td>


                            <td>
                            <div class="btn-group">
                                <a href="{{route('posts.show',$post->id)}}" class="btn btn-app">
                                    <i class="fas fa-eye"></i> Show
                                </a>
                                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-app">
                                    <i class="fas fa-edit"></i> Edit
                                </a>


                                {!!  Form::open(
                                    ['route' => ['posts.destroy', $post->id],
                                      'method' => 'delete',
                                      'class' => 'form-inline'
                                    ])    !!}

                                <button type="submit" class="btn btn-app">
                                    <i class="fas fa-trash"></i> Delete
                                </button>

                                {!! Form::close() !!}

                            </div>
                        </td>
                    </tr>
                @endforeach
            @endisset

            </tbody>
            {!!$posts->links() !!}
        </table>
    </div>
</section>


@endsection
