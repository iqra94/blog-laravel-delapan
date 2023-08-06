<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/unpas-home') }}">BLOG</a>
    {{-- <div class="search-bar">
      <form action="" method="POST">
        @csrf
        <div class="input-group ml-2">
          <input required type="search" name="product_name" id="search_product" class="form-control" palceholder="Search product" aria-describedby="basic-addon1">
          <button class="input-group-text" type="submit"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div> --}}
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ $active === "home" ? 'active':'' }}" href="/unpas-home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === "about" ? 'active':'' }}" href="/unpas-about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === "posts" ? 'active':'' }}" href="/unpas-posts">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $active === "categories" ? 'active':'' }}" href="/unpas-categories">Categories</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        @auth
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Welcome back, {{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="/unpas-dashboard">My Dashboard</a>
            </li>
            <li class="dropdown-divider"></li>
            <li>
              <form action="/unpas-logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
              </form>
            </li>
          </ul>
        </li>
        @else
        <li class="nav-item {{ $active === "login" ? 'active':'' }}">
          <a class="nav-link" href="/unpas-login">Login</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>