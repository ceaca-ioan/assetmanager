<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Information Assurance</title>
		<!-- CSS -->
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}"> 
		<link rel="stylesheet" href="{{ URL::asset('js/jquery-ui-1.12.0/jquery-ui.css') }}"> 
		<link rel="stylesheet" href="{{ URL::asset('js/jquery-ui-1.12.0/jquery-ui.theme.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}"> 
		<link rel="icon" href="{{ URL::asset('images/favicon.png') }}" type="image/png" sizes="16x16">
		<!-- Fonts --> 
		<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}"> 
		<!-- Scripts -->
		<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('js/jquery-ui-1.12.0/jquery-ui.js') }}"></script> <!-- for autocomplete function-->		
		<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
		@yield('scripts')
	</head>
	<body>
		@include('templates.partials.navigation')
		<div class="container">
			@include('templates.partials.alerts')
			@yield('content')
		</div>
		<!-- JavaScripts-->
	<!--<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>-->
	<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
	</body>
</html>