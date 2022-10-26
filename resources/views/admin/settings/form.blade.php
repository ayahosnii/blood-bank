<div class="card-body">
    <div class="form-group">
        {{  Form::label('notification_settings_text', 'Notification settings text') }}

        {{Form::text('notification_settings_text', $setting->notification_settings_text ,
        ['class' => 'form-control', 'placeholder' => 'notification_settings_text'])}}

        {{--@error('name_en')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}

    </div>
    <div class="form-group">
        {{  Form::label('about_app', 'About app') }}

        {{Form::text('about_app', $setting->about_app,
        ['class' => 'form-control', 'placeholder' => 'about_app'])}}
        {{--@error('name_ar')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}
    </div>
    <div class="form-group">
        {{  Form::label('phone', 'phone') }}

        {{Form::text('phone', $setting->phone,
        ['class' => 'form-control', 'placeholder' => 'phone'])}}
        {{--@error('name_ar')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}
    </div>
    <div class="form-group">
        {{  Form::label('email', 'email') }}

        {{Form::text('email', $setting->email,
        ['class' => 'form-control', 'placeholder' => 'email'])}}
        {{--@error('name_ar')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}
    </div>
    <div class="form-group">
        {{  Form::label('fk_link', 'fk_link') }}

        {{Form::text('fk_link', $setting->fk_link,
        ['class' => 'form-control', 'placeholder' => 'fk_link'])}}
        {{--@error('name_ar')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}
    </div>
    <div class="form-group">
        {{  Form::label('tw_link', 'tw_link') }}

        {{Form::text('tw_link', $setting->tw_link,
        ['class' => 'form-control', 'placeholder' => 'tw_link'])}}
        {{--@error('name_ar')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}
    </div>
    <div class="form-group">
        {{  Form::label('insta_link', 'insta_link') }}

        {{Form::text('insta_link', $setting->insta_link,
        ['class' => 'form-control', 'placeholder' => 'insta_link'])}}
        {{--@error('name_ar')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}
    </div>
    <div class="form-group">
        {{  Form::label('yt_link', 'yt_link') }}

        {{Form::text('yt_link', $setting->yt_link,
        ['class' => 'form-control', 'placeholder' => 'yt_link'])}}
        {{--@error('name_ar')
        <span class="text-danger">{{$message}}</span>
        @enderror--}}
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    {!! Form::submit( 'Update'  , ['name' => 'submit','class' => 'btn btn-warning']) !!}
</div>
