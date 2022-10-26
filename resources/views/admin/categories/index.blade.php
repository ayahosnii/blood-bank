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
                        <h1 class="m-0">Categories</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Categories</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

<section class="content">
    <div class="card-body">
        <div class="col-sm-2">
        <a href="{{route('categories.create')}}" class="btn btn-block btn-primary btn-sm">Create +</a>
            @include('flash::message')

        </div>
        <div class="mt-4 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Categories</th>
               <th>Action</th>
              </tr>
          </thead>
        <tbody>
          @if(isset($categories))
            @foreach($categories as $category)
               <tr>
                 <td>{{$loop->iteration}}.</td>
                  @if(get_default_lang() === 'en')
                    <td>{{$category->name_en}}</td>
                  @else
                    <td>{{$category->name_ar}}</td>
                  @endif

                   <td>
                       <div class="btn-group">
                           <a href="{{route('categories.edit',$category->id)}}" class="btn btn-app">
                               <i class="fas fa-edit"></i> Edit
                           </a>

                           {!!  Form::open(
                               ['route' => ['categories.destroy', $category->id],
                                 'method' => 'delete',
                                 'class' => 'form-inline'
                               ])    !!}

                           <button type="submit" class="btn btn-app">
                               <i class="fas fa-trash"></i> Delete
                           </button>

                           {!! Form::close() !!}

                       </div>
                   </td>
            @endforeach

          @else
                   <tr>No Data</tr>
                   @endif
               </tr>

        </tbody>
       </table>
        </div>
        {!!$categories->links() !!}
    </div>
</section>


@endsection
