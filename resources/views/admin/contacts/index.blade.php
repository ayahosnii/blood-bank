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
                        <h1 class="m-0">contacts</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">contacts</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

<section class="content">
    <div class="card-body">
        <div class="col-sm-2">
            @include('flash::message')
        </div>
        <div class="mt-4 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>contacts</th>
              <th>Percentage</th>
               <th>Action</th>
              </tr>
          </thead>
        <tbody>
          @if(count($contacts))
            @foreach($contacts as $contact)
               <tr>
                 <td>{{$loop->iteration}}.</td>
                    <td>{{$contact->subject}}</td>
                    <td>{{$contact->message}}</td>
                    <td>{{$contact->client->name}}</td>

                   <td>
                       <div class="btn-group">

                           {!!  Form::open(
                               ['route' => ['contacts.destroy', $contact->id],
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
          @else
              <tr>No Data</tr>
           @endif
        </tbody>
       </table>
        </div>
        {!!$contacts->links() !!}
    </div>
</section>


@endsection
