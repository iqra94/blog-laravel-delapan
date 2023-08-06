@extends('unpas-laravel8.unpas-dashboard.dash-home')

@section('content')
<div class="container">
  <div class="row my-3">
    <div class="col-lg-8">
      <h3 class="my-3">{{ $post->title }}</h3>
      <a href="/unpas-dashboard/posts" class="btn btn-info btn-sm">Back top posts</a>
      <a href="/unpas-dashboard/posts/{{ $post->slug }}/edit" class="btn btn-success btn-sm">Edit</a>
      <form action="/unpas-dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
        @method('delete')
        {{-- @csrf --}}
        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')">Delete</button>
      </form>
      {{-- <p>{{ $post->body }}</p> --}}
      @if ($post->image)
        {{-- <div style="max-height: 350px; overflow:hidden"> --}}
          <!-- <img src="https://source.unsplash.com/1200x400?{{$post->category->name}}" class="card-img-top" text="Image cap" class="img-fluid" alt="{{ $post->category->name }}" /> -->
          <img src="{{ asset('storage/'.$post->image) }}" placeholder width="50%" height="30%" class="card-img-top" text="Image cap" class="img-fluid">
        {{-- </div> --}}
      @else
        <img src="/assets/img/cover.jpg" placeholder width="50%" height="30%" class="card-img-top" text="Image cap" class="img-fluid">
      @endif
      <div class="my-3">
        <p>{!! $post->body !!}</p>
        <!-- <p>{!! Str::limit($post->body, 15) !!}</p> -->
      </div>
    </div>
  </div>
</div>
@endsection