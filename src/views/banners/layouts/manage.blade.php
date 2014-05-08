<!DOCTYPE html>
<html>
<head>
	@section('head')
        <title>Banner Manager</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    @show
	
</head>
<body>
<div class="container">
@section('navs-bar')
	<nav class="navbar navbar-inverse">	
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('banners') }}">View All Banners</a></li>
            <li><a href="{{ URL::to('banners/create') }}">Create New Banner</a>
            <li><a href="{{ URL::to('banners/settings') }}">Settings</a>
            <li><a href="{{ URL::to('banner-test') }}">Check Banner</a>
        </ul>
	</nav>
@show

@yield('content')

</div>
</body>
</html>