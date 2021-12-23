<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Adr Blog</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
     
    </div>
    <div class="dropdown ms-1">
      <a class="btn btn-sm dropdown-toggle border-info text-light" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        Admin
      </a>
    
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <li><a class="dropdown-item" href="#">Profile <span data-feather="user"></span></a></li>
        <li>
            <form action="/logout" method="post">
              @csrf
                <button type="submit" class="dropdown-item">Logout <span data-feather="log-out"></span></button>
            </form>
        </li>
      </ul>
    </div>
    <ul></ul>
    <ul></ul>
    <ul></ul>
  
  </header>