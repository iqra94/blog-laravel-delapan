@extends('unpas-laravel8.unpas-dashboard.dash-home')

@section('content')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
  </div>
  <div class="col-lg-8">
    <form action="/unpas-dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data">
      @method('put')
      {{-- @csrf --}}
      <div class="mb-3">
        <label for="title">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" autofocus>
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="slug">Slug</label>
        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
        @error('slug')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="category">Category</label>
        <select name="unpas_category_id" id="" class="form-select">
          @foreach ($category as $c)
          @if (old('unpas_category_id', $post->unpas_category_id) == $c->id)
            <option value="{{ $c->id }}" selected>{{ $c->name }}</option>
          @else
            <option value="{{ $c->id }}">{{ $c->name }}</option>            
          @endif
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="image">Post Image</label>
        <input type="hidden" name="oldImage" value="{{ $post->image }}">
        @if ($post->image)
          <img src="{{ asset('storage/'.$post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        @else
          <img class="img-preview img-fluid mb-3 col-sm-5 d-block">          
        @endif
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
      </div>
      <div class="mb-3">
        <label for="body">Body</label>
        @error('body')<small class="text-danger d-block">{{ $message }}</small>@enderror
        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
        <trix-editor input="body"></trix-editor>
      </div>
      <button class="w-100 btn btn-primary btn-lg" type="submit">Edit post</button>
    </form>
  </div>

  <script>
    const title = document.querySelector('#title')
    const slug = document.querySelector('#slug')

    title.addEventListener('change', function(e){
      fetch('/unpas-dashboard/posts/checkSlug?title='+title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
    })

    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault()
    })

    function previewImage(){
      const image = document.querySelector('#image')
      const imgPreview = document.querySelector('.img-preview')

      imgPreview.style.display = 'block'

      const oFReader = new FileReader()
      oFReader.readAsDataURL(image.files[0])

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result
      }
    }
  </script>
@endsection