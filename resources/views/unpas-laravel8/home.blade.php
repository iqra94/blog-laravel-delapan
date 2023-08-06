<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('judul')</title>
  <!-- CSS Files -->
  <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
</head>
<body>

	@include('unpas-laravel8.navbar')
	<div class="container">
		@yield('content')
	</div>
	
	<!--   Core JS Files   -->
	<script src="{{ asset('assets/frontend/js/bootstrap5.bundle.min.js') }}"></script>

	@yield('scripts')
</body>
</html>
