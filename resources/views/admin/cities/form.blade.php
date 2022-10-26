<div class="card-body">
    <div class="form-group">
        {{  Form::label('name_en', 'City Name [en]') }}

        {{Form::text('city_name_en', (isset($city) ? $city->city_name_en :null),
        ['class' => 'form-control', 'placeholder' => 'Enter city [en]'])}}

        {{--@error('name_en')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}

    </div>
    <div class="form-group">
        {{  Form::label('name_ar', 'City Name [ar]') }}

        {{Form::text('city_name_ar', (isset($city) ? $city->city_name_ar :null),
        ['class' => 'form-control', 'placeholder' => 'Enter city [ar]'])}}
        {{--@error('name_ar')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}


    </div>
    <div class="form-group">
        {{  Form::label('name_ar', 'City Name [ar]') }}

{{--
        {{Form::select('governorate_id', array('L' => 'Large', 'S' => 'Small'));}}
--}}
        {!! Form::select('governorate_id', $governorates, null  , ['class' => 'form-control select2']) !!}
        {{--@error('name_ar')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}


    </div>
    {!! Form::hidden('id' , isset($city) ? $city->id : null, ['readonly']) !!}
</div>
<!-- /.card-body -->
<div class="card-footer">
    {!! Form::submit(isset($city) ? 'Update' : 'Create' , ['name' => 'submit','class' => 'btn btn-primary']) !!}
</div>
