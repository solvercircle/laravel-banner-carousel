@section('content')
<h1>Settings</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::model($settings, array('url' => 'banners/update-settings', 'method' => 'POST','enctype'=>'multipart/form-data')) }}


	<div class="form-group">
		{{ Form::label('upload_path', 'File Upload Path') }}
		{{ Form::text('upload_path', Input::old('upload_path'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('interval', 'Interval') }}
		{{ Form::text('interval', Input::old('interval'), array('class' => 'form-control')) }}
	</div>
    
    <div class="form-group">
		{{ Form::label('banner_width', 'Banner Maximum Width') }}
		{{ Form::text('banner_width', Input::old('banner_width'), array('class' => 'form-control')) }}
	</div>
    
    <div class="form-group">		
		{{ Form::checkbox('enable_image_cache', 1, false) }}
        {{ Form::label('enable_image_cache', 'Enable Cache') }}
	</div>

	{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop
