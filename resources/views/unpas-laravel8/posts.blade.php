@extends('unpas-laravel8.home')
{{-- {{ dd($posts) }} --}}
@section('content')
  <h1 class="my-3 text-center">{{ $title }}</h1>
  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/unpas-posts">
        @if (request('category'))
          <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('unpasUser'))
          <input type="hidden" name="unpasUser" value="{{ request('unpasUser') }}">
        @endif
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
          <button class="btn btn-danger" type="submit">Search</button>
        </div>
      </form>
    </div>
  </div>
  @if ($posts->count())
    <div class="card mb-3">
      @if ($posts[0]->image)
        {{-- <div style="max-height: 350px; overflow:hidden"> --}}
        <img src="https://source.unsplash.com/1200x400?{{$posts[0]->category->name}}" class="card-img-top" text="Image cap" class="img-fluid" alt="{{ $posts[0]->category->name }}" />
          <!-- <img src="{{ asset('storage/'.$posts[0]->image) }}" placeholder width="50%" height="30%" class="card-img-top" text="Image cap" class="img-fluid" alt="{{ $posts[0]->category->name }}" /> -->
        {{-- </div> --}}
      @else
        <img src="https://source.unsplash.com/1200x400?{{$posts[0]->category->name}}" class="card-img-top" text="Image cap" class="img-fluid" alt="{{ $posts[0]->category->name }}" />
        <!-- <img src="/assets/img/cover.jpg" placeholder width="50%" height="30%" class="card-img-top" text="Image cap" class="img-fluid" alt="{{ $posts[0]->category->name }}" /> -->
      @endif
      <!-- {{-- <img src="/assets/img/cover.jpg" placeholder width="100%" height="400" class="card-img-top" text="Image cap" > --}} -->
      <div class="card-body text-center">
        <h3><a class="card-title text-decoration-none text-dark" href="/unpas-post/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a></h3>
        <p>
          <small class="text-muted">
            By. <a class="text-decoration-none" href="/unpas-posts?unpasUser={{ $posts[0]->unpasUser->username }}">{{ $posts[0]->unpasUser->name }}</a> in <a class="text-decoration-none" href="/unpas-posts?category={{ $posts[0]->category->slug }}">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
          </small>
        </p>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a class="text-decoration-none btn btn-primary btn-sm" href="/unpas-post/{{ $posts[0]->slug }}">Read more</a>
      </div>
    </div>

    <div class="container">
      <div class="row">
        @foreach ($posts->skip(1) as $post)
          <div class="col-md-4">
            <div class="card my-2">
              <div class="position-absolute bg-dark px-3 py-2 text-white"><a class="text-decoration-none text-white" href="/unpas-posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></div>
              @if ($post->image)
                <img src="https://source.unsplash.com/500x350?{{$posts[0]->category->name}}" class="card-img-top" text="Image cap" class="img-fluid" alt="{{ $posts[0]->category->name }}" />
                <!-- <img src="{{ asset('storage/'.$post->image) }}" placeholder width="50%" height="30%" class="card-img-top" text="Image cap" class="img-fluid" alt="{{ $post->category->name }}" /> -->
              @else
                <img src="https://source.unsplash.com/500x350?{{$posts[0]->category->name}}" class="card-img-top" text="Image cap" class="img-fluid" alt="{{ $posts[0]->category->name }}" />
                <!-- <img src="/assets/img/cover.jpg" placeholder width="50%" height="40%" class="card-img-top" text="Image cap" />                 -->
              @endif
              <div class="card-body">
                <h5 class="card-title">{{ Str::limit($post->title, 15) }}</h5>
                <p>
                  <small class="text-muted">
                    By. <a class="text-decoration-none" href="/unpas-posts?unpasUser={{ $post->unpasUser->username }}">{{ $post->unpasUser->name }}</a> {{ $post->created_at->diffForHumans() }}
                  </small>
                </p>
                <p class="card-text">{{ Str::limit($post->excerpt, 50) }}</p>
                <a class="text-decoration-none btn btn-primary btn-sm" href="/unpas-post/{{ $post->slug }}">Read more</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @else
    <p class="text-center fs-4">No post found.</p>      
  @endif

  <div class="d-flex justify-content-end">
    {{ $posts->links() }}
  </div>
  
  {{-- App\Models\Unpas\UnpasPost::create([
    'title'=> 'Judul ketiga',
    'category_id'=> 3,
    'slug'=> 'judul-ketiga',
    'excerpt'=> 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, exercitationem aliquam.',
    'body'=> '<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Numquam, exercitationem aliquam. Maxime eligendi placeat nostrum at delectus repellat ab temporibus minus dicta eos magni adipisci, est harum, blanditiis veritatis eveniet distinctio molestiae ipsum amet, modi nulla explicabo. Nulla exercitationem, molestiae ab a molestias pariatur. Magni, accusamus nulla.</p><p> Aut facere culpa cupiditate fuga? Esse quibusdam molestias ipsa aperiam minus inventore animi hic totam minima eos autem, officiis veniam tempora architecto delectus repellat eum, placeat in libero. Itaque ab impedit atque eveniet doloremque, ipsa quos maiores dignissimos nulla eius? Voluptas, exercitationem nostrum, labore nam eius error explicabo, quos repudiandae voluptatibus molestias dolore reprehenderit impedit atque nobis accusamus.</p><p> Aliquam commodi provident dicta beatae molestias in eligendi sequi eum rerum, perspiciatis similique numquam sit harum dolore impedit totam, soluta esse fuga accusantium maxime quas laborum nobis at. Officia libero veniam a exercitationem voluptas aliquid repellendus natus, pariatur sequi ducimus laboriosam vitae tempora, ipsa quasi?</p>'
  ])

  App\Models\Unpas\UnpasCategory::create([
    'name'=> 'Personal',
    'slug'=> 'personal',
  ]) --}}
@endsection