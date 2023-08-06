<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>

	<!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	{{-- <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" /> --}}
  <!-- CSS Files -->
  <link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/frontend/css/custom_sharma_code.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/frontend/css/jquery-ui.min.css') }}" rel="stylesheet" />

	<link href="{{ asset('assets/frontend/css/owl.carousel.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/frontend/css/owl.theme.default.min.css') }}" rel="stylesheet" />
	<style>a{text-decoration: none !important; color: #000 !important;}</style>
</head>
<body>

	@include('layouts.inc.frontnav')
	<div class="content">
		@yield('content')
	</div>

	<div class="whatsapp-chat">
		<a href="https://wa.me/+62815551234567?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
			<img src="{{ asset('assets/img/apple-icon.png') }}" alt="whatsapp-chat" width="50px" height="50px">
		</a>
	</div>
	
	<!--   Core JS Files   -->
	<script src="{{ asset('assets/frontend/js/bootstrap5.bundle.min.js') }}" defer></script>
	<script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/custom_sharma_code.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/frontend/js/checkout_sharma_code.js') }}"></script>
	<script>
		var availableTags = [];
			$.ajax({
				method: "GET",
				url: "/product-list",
				success: function(response){
					// console.log(response)
					startAutoComplete(response)
				}
			})
			function startAutoComplete(availableTags){
				$( "#search_product" ).autocomplete({
					source: availableTags
				});
			}
		</script>
	
	<script src="{{ asset('assets/js/plugins/sweetalert.min.js') }}"></script>
	@if (session('status'))
		<script>
			swal("{{ session('status') }}");
		</script>
	@endif

	@yield('scripts')
</body>
</html>
