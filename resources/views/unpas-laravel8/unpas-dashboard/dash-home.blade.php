<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog | Dashboard</title><link href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/dashboard-bs5.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/trix.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/js/trix.js') }}"></script>
  <style>
    trix-toolbar [data-trix-button-group="file-tools"]{
      display: none;
    }
  </style>
</head>
<body>
    
@include('unpas-laravel8.unpas-dashboard.dash-header')

<div class="container-fluid">
  <div class="row">
    @include('unpas-laravel8.unpas-dashboard.dash-sidebar')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      @yield('content')
    </main>
  </div>
</div>


    <script src="{{ asset('assets/frontend/js/bootstrap5.bundle.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('assets/js/dashboard-bs5.js') }}"></script>
  </body>
</html>
