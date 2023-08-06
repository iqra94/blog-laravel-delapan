@extends('unpas-laravel8.home')
{{-- {{ dd($posts) }} --}}
@section('content')
  <div class="row justify-content-center my-5">
    <div class="col-lg-4">
      <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
      <form action="/unpas-register" method="post">
        {{-- @csrf --}}
        <div class="form-floating my-1">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" id="name" required value="{{ old('name') }}">
          <label for="name">Name</label>
          @error('name')<div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating my-1">
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" id="username" required value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('username')<div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating my-1">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" required value="{{ old('email') }}">
          <label for="email">Email</label>
          @error('email')<div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-floating my-1">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password" required value="{{ old('password') }}">
          <label for="password">Password</label>
          @error('password')<div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <button class="w-100 btn btn-primary btn-lg" type="submit">Register</button>
      </form>
      <small class="d-block my-2 text-center">Back to <a href="/unpas-login">Login</a></small>
    </div>
  </div>
@endsection