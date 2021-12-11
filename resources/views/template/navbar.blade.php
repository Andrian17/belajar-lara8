<nav class="navbar navbar-expand-lg navbar-dark bg-danger justify-content-center ">
    <div class="container text-center">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link {{ $title == 'Post' ? 'active' : '-' }}" aria-current="page" href="{{ url('post/') }}">Home</a>
          <a class="nav-link  {{ $title == 'Category' ? 'active' : '-' }} " aria-current="page" href="{{ url('category/') }}">Categories</a>
          <a class="nav-link {{ $title == 'User' ? 'active' : '-' }} " aria-current="page" href="{{ url('user/') }}">Post By User</a>
          <a class="nav-link" href="{{ url('/about') }}">About</a>
        </div>
      </div>
    </div>
  </nav>