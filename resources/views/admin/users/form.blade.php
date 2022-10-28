<div class="card-body">
    <div class="form-group">
        {{  Form::label('name', 'Name') }}

        {{Form::text('name', (isset($user) ? $user->name :null),
        ['class' => 'form-control', 'placeholder' => 'Enter Name'])}}

        {{--@error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}

    </div>
    <div class="form-group">
        {{  Form::label('email', 'Email') }}

        {{Form::text('email', (isset($user) ? $user->email :null),
        ['class' => 'form-control', 'placeholder' => 'Email'])}}
        {{--@error('email')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}
    </div>
    <div class="form-group">
        {{  Form::label('password', 'Password') }}

        {{Form::password('password',
        ['placeholder'=>'Password', 'class'=>'form-control' ])}}


        {{--@error('password')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}
    </div>
    <div class="form-group">
        {{  Form::label('password_confirmation', 'Confirm Password') }}

        {{Form::password('password_confirmation',
        ['placeholder' => 'Password Confirmation', 'class'=>'form-control'])}}
        {{--@error('password_confirm')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}

        {{  Form::label('roles_list', 'Roles') }}
        <div class="flex flex-wrap justify-start mb-4">

            {!! Form::select('roles_list[]',$roles,null,[
                'class' => 'select2 form-control',
                'multiple' => 'multiple'
            ]) !!}

        </div>
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    {!! Form::submit(isset($user) ? 'Update' : 'Create' , ['name' => 'submit','class' => 'btn btn-primary']) !!}
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.select2').select2({})
        })
    </script>
@endpush
