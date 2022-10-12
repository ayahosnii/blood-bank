{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('notification_settings_text', 'Notification_settings_text:') !!}
			{!! Form::textarea('notification_settings_text') !!}
		</li>
		<li>
			{!! Form::label('about_app', 'About_app:') !!}
			{!! Form::textarea('about_app') !!}
		</li>
		<li>
			{!! Form::label('phone', 'Phone:') !!}
			{!! Form::text('phone') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('fk_link', 'Fk_link:') !!}
			{!! Form::text('fk_link') !!}
		</li>
		<li>
			{!! Form::label('tw_link', 'Tw_link:') !!}
			{!! Form::text('tw_link') !!}
		</li>
		<li>
			{!! Form::label('insta_link', 'Insta_link:') !!}
			{!! Form::text('insta_link') !!}
		</li>
		<li>
			{!! Form::label('yt_link', 'Yt_link:') !!}
			{!! Form::text('yt_link') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}