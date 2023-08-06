@extends('unpas-laravel8.home')

@section('content')
  <h3 class="my-3">Post Categories</h3>

  <div class="container">
    <div class="row">
      @foreach ($categories as $category)
        <div class="col-md-4">
          <a href="/unpas-posts?category={{ $category->slug }}">
            <div class="card text-white bg-dark">
              <img src="/assets/img/cover.jpg" width="50%" height="30%" class="bd-placeholder-img-lg card-img" text="Card image" >
              <div class="card-img-overlay d-flex align-items-center p-0">
                <h5 class="card-title text-center flex-fill p-3" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
  </div>
@endsection