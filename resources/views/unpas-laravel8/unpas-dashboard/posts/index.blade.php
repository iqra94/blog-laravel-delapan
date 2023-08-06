@extends('unpas-laravel8.unpas-dashboard.dash-home')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
  </div>
  @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
      {{ session('success') }}
      {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
    </div>
  @endif
  <div class="table-responsive col-lg-8">
    <a href="/unpas-dashboard/posts/create" class="btn btn-info btn-sm my-2">Create new post</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->title }}</td>
          <td>{{ $post->category->name }}</td>
          <td>
            <a href="/unpas-dashboard/posts/{{ $post->slug }}" class="btn btn-info btn-sm">Detail</a>
            <a href="/unpas-dashboard/posts/{{ $post->slug }}/edit" class="btn btn-success btn-sm">Edit</a>
            <form action="/unpas-dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
              @method('delete')
              {{-- @csrf --}}
              <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure ?')">Delete</button>
            </form>
          </td>
        </tr>          
        @endforeach
      </tbody>
    </table>
  </div>
@endsection