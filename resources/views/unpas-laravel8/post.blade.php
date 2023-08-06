@extends('unpas-laravel8.home')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h3 class="my-3">{{ $post->title }}</h3>
        <p>By. <a class="text-decoration-none" href="/unpas-posts?unpasUser={{ $post->unpasUser->username }}">{{ $post->unpasUser->name }}</a> in <a href="/unpas-posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
        {{-- <p>{{ $post->body }}</p> --}}
        {{-- <img src="/assets/img/cover.jpg" placeholder width="50%" height="30%" class="card-img-top" text="Image cap" class="img-fluid"> --}}
        @if ($post->image)
        {{-- <div style="max-height: 350px; overflow:hidden"> --}}
          <!-- <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" class="card-img-top" text="Image cap" class="img-fluid" alt="{{ $post->category->name }}" /> -->
          <img src="{{ asset('storage/'.$post->image) }}" placeholder width="50%" height="30%" class="card-img-top" text="Image cap" class="img-fluid">
        {{-- </div> --}}
        @else
          <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" class="card-img-top" text="Image cap" class="img-fluid" alt="{{ $post->category->name }}" />
          <!-- <img src="/assets/img/cover.jpg" placeholder width="50%" height="30%" class="card-img-top" text="Image cap" class="img-fluid" //> -->
        @endif
        <div class="my-3">
          <p>{!! $post->body !!}</p>
        </div>
        <a href="/unpas-posts">Back top posts</a>
      </div>
    </div>
  </div>
@endsection