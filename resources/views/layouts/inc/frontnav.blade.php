<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">E-Shop</a>
    <div class="search-bar">
      <form action="{{ url('searchproduct') }}" method="POST">
        @csrf
        <div class="input-group ml-2">
          <input required type="search" name="product_name" id="search_product" class="form-control" palceholder="Search product" aria-describedby="basic-addon1">
          <button class="input-group-text" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('category') }}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('cart') }}">Cart
          <span class="badge bafge-pill bg-success count-cart">0</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('wishlist') }}">Wishlist
          <span class="badge bafge-pill bg-primary count-wishlist">0</span>
          </a>
        </li>

        @guest
          @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
          @endif

          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
      @else
      {{--  --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="dropdown-item" href="{{ url('my-orders') }}">
              My Order
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="#">
              My Profil
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
          </li>
        </ul>
      </li>
      @endguest
      </ul>
    </div>
  </div>
</nav>