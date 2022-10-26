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
                        <h1 class="m-0">Cities</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Cities</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

<section class="content">
    <div class="card-body">
        <div class="col-sm-2">
        <a href="{{route('cities.create')}}" class="btn btn-block btn-primary btn-sm">Create +</a>
            @include('flash::message')

        </div>
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Governorate</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
            @isset($cities)
                @foreach($cities as $city)
                    <tr>
                        <td>{{$city->id}}</td>

                        @if(get_default_lang() === 'en')
                        <td>{{$city->city_name_en}}</td>
                        @else
                        <td>{{$city->city_name_ar}}</td>
                        @endif

                        @if(get_default_lang() === 'en')
                        <td>{{$city->governorate->name_en}}</td>
                        @else
                        <td>{{$city->governorate->name_ar}}</td>
                        @endif

                            <td>
                            <div class="btn-group">
                                <a href="{{route('cities.edit',$city->id)}}" class="btn btn-app">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                {!!  Form::open(
                                    ['route' => ['cities.destroy', $city->id],
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
            {!!$cities->links() !!}
        </table>
    </div>
</section>


@endsection
