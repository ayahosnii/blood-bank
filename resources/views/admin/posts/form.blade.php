<div class="card-body">
    <div class="form-group">
        {{  Form::label('title', 'Title') }}

        {{Form::text('title', (isset($post) ? $post->title :null),
        ['class' => 'form-control', 'placeholder' => 'Enter Title [en]'])}}

        {{--@error('title')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}

    </div>
    <div class="form-group">
        {{  Form::label('content', 'Content') }}

        {{Form::textarea('contents', (isset($post) ? $post->content :null),
        ['class' => 'form-control', 'placeholder' => 'Enter Content'])}}
        {{--@error('content')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}


    </div>
    <div class="form-group">
        {{  Form::label('image', 'Image') }}
        <div class="input-group">
            <div class="custom-file">
                {{Form::file('image', /*(isset($post) ? $post->image :null),*/
                ['class' => 'custom-file-input'])}}
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        {{  Form::label('categories', 'Categories') }}

{{--
        {{Form::select('category_id', array('L' => 'Large', 'S' => 'Small'));}}
--}}
        {!! Form::select('category_id', $categories, null  , ['class' => 'form-control select2']) !!}
        {{--@error('content')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}


    </div>
    {!! Form::hidden('id' , isset($post) ? $post->id : null, ['readonly']) !!}
</div>
<!-- /.card-body -->
<div class="card-footer">
    {!! Form::submit(isset($post) ? 'Update' : 'Create' , ['name' => 'submit','class' => 'btn btn-primary']) !!}
</div>
