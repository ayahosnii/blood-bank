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
                        <h1 class="m-0">Governorates</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Governorates</li>
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
                    <a href="{{route('governorates.create')}}" class="btn btn-block btn-primary btn-md" style="width: 150px;">Create +</a>
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
              <th>Governorates</th>
              <th>Percentage</th>
               <th>Action</th>
              </tr>
          </thead>
        <tbody>
          @if(count($governorates))
            @foreach($governorates as $governorate)
               <tr>
                 <td>{{$loop->iteration}}.</td>
                  @if(get_default_lang() === 'en')
                    <td>{{$governorate->name_en}}</td>
                  @else
                    <td>{{$governorate->name_ar}}</td>
                  @endif
                    <td>
                          <span class="badge bg-danger">{{$governorate->client->count()}}</span>
                    </td>
                   <td>
                       <div class="btn-group">
                           <a href="{{route('governorates.edit',$governorate->id)}}" class="btn btn-app">
                               <i class="fas fa-edit"></i> Edit
                           </a>
                           <a class="btn btn-app" data-toggle="modal" id="smallDelete" data-target="#smallModal" data-attr="{{ route('governorates.destroy', $governorate->id) }}" title="Delete Category">
                               <i class="fas fa-trash"></i> Delete
                           </a>

                           @push('deletion')
                           {!!  Form::open(
                               ['route' => ['governorates.destroy', $governorate->id],
                                 'method' => 'delete',
                                 'class' => 'form-inline'
                               ])    !!}

                               <div class="modal-body">
                                   <h5 class="text-center">Are you sure you want to delete [@if(get_default_lang() === 'en'){{$governorate->name_en}}@else{{$governorate->name_ar}}@endif] ?</h5>
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
        {!!$governorates->links() !!}
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
                        url : '{{URL::to('admin/gov/search')}}',
                        data:{'search':$value},
                        success: function (data) {
                            $('tbody').html(data);
                        }
                    });
                })
            </script>
@endpush
