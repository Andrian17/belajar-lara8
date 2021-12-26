<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/post*') ? 'active' : ''}}" href="/dashboard/post">
            <span data-feather="file-text"></span>
            My Post
          </a>
        </li>
      </ul>

      @can('admin')
        <h6 class="sidebar-heading d-flex justify-content-center justify-content-between align-items-center px-3 mt-4 text-muted">
          <small class="justify-content-between ">Admin</small>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/category*') ? 'active' : ''}}" href="/dashboard/category">
              <span data-feather="file-text"></span>
              Post Category
            </a>
          </li>
        </ul>
      @endcan
    </div>
  </nav>
