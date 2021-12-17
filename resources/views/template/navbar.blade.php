{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-danger justify-content-center ">
    <div class="container text-center">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          
          
          
         
          <a class="nav-link ms-" href="{{ url('/about') }}">Login</a>

        </div>
      </div>
    </div>
  </nav> --}}

  <nav class="navbar navbar-expand-lg navbar-dark bg-danger justify-content-center">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Andrian</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ $title == 'Post' ? 'active' : '-' }}" aria-current="page" href="{{ url('post/') }}">Home</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link  {{ $title == 'Category' ? 'active' : '-' }} " aria-current="page" href="{{ url('category/') }}">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $title == 'User' ? 'active' : '-' }} " aria-current="page" href="{{ url('user/') }}">Post By User</a>
          </li>
          @endauth
          
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/about') }}">About</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @auth
            {{--  --}}
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Hello {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle"></i> Profile</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-house-fill"></i> Dashboard</a></li>
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>
                </ul>
              </li>
          @else
            {{-- akan tampil hanya ketika  belum login --}}
              <li class="nav-item">
                 <a href="{{ url('/login') }}" class="nav-link"><i class="bi bi-box-arrow-in-left"></i>Login </a>
               </li>
          @endauth
        </ul>
        <ul></ul>
       
      </div>
    </div>
  </nav>