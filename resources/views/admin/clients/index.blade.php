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
                        <h1 class="m-0">Clients</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Clients</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

<section class="content">
    <div class="card-body">
        <div class="col-sm-2">
        <a href="{{route('clients.create')}}" class="btn btn-block btn-primary btn-sm">Create +</a>
            @include('flash::message')

        </div>
        <div class="mt-4 align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
        <table class="table text-center">
          <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th class="th">Name</th>
                <th class="th">Email</th>
                <th class="th">Date of birth</th>
                <th class="th">Phone</th>
                <th class="th">Last donation date</th>
                <th class="th">Blood type</th>
                <th class="th">City</th>
                <th class="th">Status</th>
                <th class="th">Operations</th>
              </tr>
          </thead>
        <tbody class="bg-white">
          @if(isset($clients))
            @foreach($clients as $client)
               <tr>
                 <td>{{$loop->iteration}}.</td>
                 <td>{{$client->name}}</td>
                 <td>{{$client->email}}</td>
                 <td>{{$client->d_o_b}}</td>
                 <td>{{$client->phone}}</td>
                 <td>{{$client->last_donation_date}}</td>
                 <td>{{$client->bloodType->name}}</td>
                 <td>{{$client->city->city_name_en}}</td>
                 <td>
                    <form action = {{url('http://127.0.0.1:8000/admin/changeStatus/'. $client->id)}}
                        method = post class = form-inline>


                    <button type="submit" class="btn btn-app">
                        @if ($client->activation == 1)
                    <i class="fas fa-circle" style="color:aquamarine"></i>active
                    @else
                    <i class="fas fa-circle" style="color:rgb(255, 127, 127)"></i>inactive
                    @endif
                    </button>

                    </form>


                </td>
                   <td>
                       <div class="btn-group">
                           <a href="{{route('clients.edit',$client->id)}}" class="btn btn-app">
                               <i class="fas fa-edit"></i> Edit
                           </a>

                           {!!  Form::open(
                               ['route' => ['clients.destroy', $client->id],
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
</div>
</section>


@endsection

@section('admin_script')
<script>
    $(document).ready(function(){
        $('.active-class').change(function () {
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('changeStatus', $client->id) }}",
                success: function (data) {
                    console.log(data.message);
                }
            });
        });
    });
    </script>
@endsection
