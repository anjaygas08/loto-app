<nav class="main-header navbar navbar-expand navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <div href="#" class="brand-link" style="text-align: center;">
    <span class="brand-text"><img src="{{ url('assets/dist/img/logo-plnip.png') }}" style="height: 2.1rem" alt="PLN IP Logo"></span>
  </div>
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ url('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ url('admin/dashboard') }}" class="nav-link @if(Request::segment(2) == 'dashboard') elevation-2 active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/admin/list') }}" class="nav-link @if(Request::segment(2) == 'admin') elevation-2 active @endif">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Admin
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/loto-permit/list') }}" class="nav-link @if(Request::segment(2) == 'loto-permit') elevation-2 active @endif">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Form LOTO
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/category/list') }}" class="nav-link @if(Request::segment(2) == 'category') elevation-2 active @endif">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Category
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/sub_category/list') }}" class="nav-link @if(Request::segment(2) == 'sub_category') elevation-2 active @endif">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
              Sub Category
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/color/list') }}" class="nav-link @if(Request::segment(2) == 'color') elevation-2 active @endif">
            <i class="nav-icon fas fa-palette"></i>
            <p>
              Color
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/checklist/list') }}" class="nav-link @if(Request::segment(2) == 'checklist') elevation-2 active @endif">
            <i class="nav-icon fas fa-tasks"></i>
            <p>
              Checklist
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/loto_status/list') }}" class="nav-link @if(Request::segment(2) == 'loto_status') elevation-2 active @endif">
            <i class="nav-icon fas fa-tasks"></i>
            <p>
              LOTO Status
            </p>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="nav-item">
          <a href="{{ url('admin/logout') }}" class="nav-link bg-danger elevation-2">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
