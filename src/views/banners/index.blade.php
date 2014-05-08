@section('content')
<h1>Site Banners</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Image</td>            
			<td>Actions</td>
           
		</tr>
	</thead>
	<tbody>
	@foreach($banners as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td><img src="{{ URL::route('image.view', array('width' => 80, 'filename' => $value->image_file_name)) }}" /></td>		

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the banner (uses the destroy method DESTROY /banners/{id} -->
				<!-- we will add this later since its a little more complicated than the first two buttons -->
				{{ Form::open(array('url' => 'banners/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete Banner', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the banner (uses the show method found at GET /banners/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('banners/' . $value->id) }}">Show Banner</a>

				<!-- edit this banner (uses the edit method found at GET /banners/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('banners/' . $value->id . '/edit') }}">Edit Banner</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@stop
