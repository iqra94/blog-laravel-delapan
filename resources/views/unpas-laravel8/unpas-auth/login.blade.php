@extends('unpas-laravel8.home')
{{-- {{ dd($posts) }} --}}
@section('content')
  <div class="row justify-content-center my-5">
    <div class="col-lg-4">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
      <form action="/unpas-login" method="post">
        {{-- @csrf --}}
        <div class="form-floating my-1">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{ old('email') }}" autofocus>
          <label for="email">Email</label>
          @error('email')<div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating my-1">
          <input type="password" class="form-control" placeholder="Password" id="password" name="password">
          <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-primary btn-lg" type="submit">Login</button>
      </form>
      <small class="d-block my-2 text-center">Not registered <a href="/unpas-register">Register Now!</a></small>
    </div>
  </div>
@endsection