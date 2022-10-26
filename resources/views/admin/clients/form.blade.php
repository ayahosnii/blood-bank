<div class="card-body">
    <div class="form-group">
        {{  Form::label('name_en', 'Governorate Name [en]') }}

        {{Form::text('name_en', (isset($governorate) ? $governorate->name_en :null),
        ['class' => 'form-control', 'placeholder' => 'Enter governorate [en]'])}}

        {{--@error('name_en')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}

    </div>
    <div class="form-group">
        {{  Form::label('name_ar', 'Governorate Name [ar]') }}

        {{Form::text('name_ar', (isset($governorate) ? $governorate->name_ar :null),
        ['class' => 'form-control', 'placeholder' => 'Enter governorate [ar]'])}}
        {{--@error('name_ar')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}


    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    {!! Form::submit(isset($governorate) ? 'Update' : 'Create' , ['name' => 'submit','class' => 'btn btn-primary']) !!}
</div>
