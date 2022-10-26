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
                        <h1 class="m-0">donations</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">donations</li>
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
                <th>Name</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Hospital</th>
                <th>Address</th>
                <th>Bags</th>
                <th>Notes</th>
                <th>City</th>
                <th>Blood Type</th>
                <th>Client</th>
                <th>Operations</th>
              </tr>
          </thead>
        <tbody>
          @if(count($donations))
            @foreach($donations as $donation)
               <tr>
                 <td>{{$loop->iteration}}.</td>
                   <td>{{$donation->patient_name}}</td>
                   <td>{{$donation->patient_age}}</td>
                   <td>{{$donation->patient_phone}}</td>
                   <td>{{$donation->hospital_name}}</td>
                   <td>{{$donation->hospital_address}}</td>
                   <td>{{$donation->bags_num}}</td>
                   <td>{{$donation->details}}</td>
                   <td>{{$donation->city->city_name_en}}</td>
                   <td>{{$donation->bloodType->name}}</td>
                   <td>{{$donation->client->name}}</td>

                   <td>
                       <div class="btn-group">

                           {!!  Form::open(
                               ['route' => ['donations.destroy', $donation->id],
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
        {!!$donations->links() !!}
    </div>
</section>


@endsection
