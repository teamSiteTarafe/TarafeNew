<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link rel="stylesheet" href="{{ asset('css/compte.css') }}">

	    <title>Tarafé- {{ $title ?? 'Page' }}</title>
	</head>
	<body>

		@include('layouts.partials.menu')

		<div class="div_nouveaute">
	        <p class="p1" > @yield('page-name') </p>
	        <div class="underline"></div>
	    </div>

	    @if(Session::has('success'))
	        <div class="alert alert-success" align="center">{{ Session::get('success') }}</div>
	    @endif



		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/compte.js') }}"></script>

	</body>

</html>