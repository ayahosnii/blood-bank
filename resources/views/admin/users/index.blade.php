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
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

<section class="content">
    <div class="card-body">
        @include('flash::message')
        <div class="row">
            <div class="col-md-6">
                <div class="col-sm-2">
                    <a href="{{route('users.create')}}" class="btn btn-block btn-primary btn-md" style="width: 150px;">Create +</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-6 breadcrumb float-sm-right">
                    <input type="text" class="form-controller" id="search" name="search" style="padding: 3px; width: 500px">
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped text-center">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>Users</th>
              <th>Percentage</th>
               <th>Action</th>
              </tr>
          </thead>
        <tbody>
          @if(count($users))
            @foreach($users as $user)
               <tr>
                 <td>{{$loop->iteration}}.</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                   <td>
                       <div class="btn-group">
                           <a href="{{route('users.edit',$user->id)}}" class="btn btn-app">
                               <i class="fas fa-edit"></i> Edit
                           </a>
                           <a class="btn btn-app" data-toggle="modal" id="smallDelete" data-target="#smallModal" data-attr="{{ route('users.destroy', $user->id) }}" title="Delete Category">
                               <i class="fas fa-trash"></i> Delete
                           </a>

                           @push('deletion')
                           {!!  Form::open(
                               ['route' => ['users.destroy', $user->id],
                                 'method' => 'delete',
                                 'class' => 'form-inline'
                               ])    !!}

                               <div class="modal-body">
                                   <h5 class="text-center">Are you sure you want to delete [@if(get_default_lang() === 'en'){{$user->name_en}}@else{{$user->name_ar}}@endif] ?</h5>
                               </div>
                           @endpush

                           @include('admin.delete_modal.delete')



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
        {!!$users->links() !!}
    </div>
</section>


@endsection
@push('scripts')
            <script type="text/javascript">
                $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
                $('#search').on('keyup',function(){
                    $value=$(this).val();
                    $.ajax({
                        type : 'get',
                        url : '{{URL::to('admin/users/search')}}',
                        data:{'search':$value},
                        success:function(data){
                            $('tbody').html(data);
                            console.log(data)
                        }
                    });
                })
            </script>
@endpush
