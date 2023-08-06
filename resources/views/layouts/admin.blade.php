<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!--     Fonts and icons     -->
  {{-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"> --}}
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/material-dashboard.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
</head>
<body>

	<div class="wrapper ">
		@include('layouts.inc.sidebar')

		<div class="main-panel">
			@include('layouts.inc.adminnav')
		
			<div class="content">
				@yield('content')
			</div>

			@include('layouts.inc.adminfooter')
		</div>
	</div>
	
	<!--   Core JS Files   -->
	<script src="{{ asset('assets/js/core/jquery.min.js') }}" defer></script>
	<script src="{{ asset('assets/js/core/popper.min.js') }}" defer></script>
	<script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }}" defer></script>
	<script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}" defer></script>
	<script src="{{ asset('assets/js/material-dashboard.min.js') }}" defer></script>

	{{--  --}}
	<script src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>
	@if (session('status'))
		<script>
			swal("{{ session('status') }}");
		</script>
	@endif
	
	@yield('scripts')
</body>
</html>
