@section('content')

<h1>Create New Banner</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'banners','enctype'=>'multipart/form-data')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>

	<!--
    <input type="file" class="btn-primary" title="Select Image">
    -->
    
    {{ Form::file('image', array('class' => 'btn-primary','title'=>'Select Image')) }}
    
    <div class="form-group">		
		{{ Form::checkbox('published', 1, false) }}
        {{ Form::label('published', 'Publish') }}
	</div>

	{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@stop
