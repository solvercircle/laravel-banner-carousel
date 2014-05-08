@section('content')
<h1>Edit {{ $banner->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($banner, array('route' => array('banners.update', $banner->id), 'method' => 'PUT','enctype'=>'multipart/form-data')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('image', 'Image') }}
		{{ Form::file('image', array('class' => 'form-control')) }}
	</div>

	<div class="form-group">		
		{{ Form::checkbox('published', 1, false) }}
        {{ Form::label('published', 'Publish') }}
	</div>

	{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

@stop