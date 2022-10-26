<div class="card-body">
    <div class="form-group">
        {{  Form::label('name_en', 'Category Name [en]') }}

        {{Form::text('name_en', (isset($category) ? $category->name_en :null),
        ['class' => 'form-control', 'placeholder' => 'Enter category [en]'])}}

        {{--@error('name_en')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}

    </div>
    <div class="form-group">
        {{  Form::label('name_ar', 'Category Name [ar]') }}

        {{Form::text('name_ar', (isset($category) ? $category->name_ar :null),
        ['class' => 'form-control', 'placeholder' => 'Enter category [ar]'])}}
        {{--@error('name_ar')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}


    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    {!! Form::submit(isset($category) ? 'Update' : 'Create' , ['name' => 'submit','class' => 'btn btn-primary']) !!}
</div>
