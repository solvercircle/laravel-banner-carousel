@section('content')
<h1>Showing {{ $banner->name }}</h1>

	<div class="jumbotron text-center">
		<h2>{{ $banner->name }}</h2>
		<p>
			<strong>Image:</strong> <img src="{{ URL::route('image.view', array('width' => 80, 'filename' => $banner->image_file_name)) }}" /><br>
			<strong>Published:</strong> {{ ($banner->published==1)?'Yes':'No' }}
		</p>
	</div>

@stop