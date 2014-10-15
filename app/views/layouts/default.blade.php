<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Default</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/main.css">
	</head>
	<body>
		@include('layouts.partials.nav')
		<div class="container">
            @include('flash::message')
			@yield('content')
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        {{-- for creating a modal popup alert if creating a Flash::overlay('') in the controller --}}
        <script>$('#flash-overlay-modal').modal();</script>
		@yield('footer-script')
	</body>
</html>