<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #007B2E;">
  <!-- Tombol Sidebar -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button">
        <i class="fas fa-bars"></i>
      </a>
    </li>
  </ul>

  <!-- Menu Kanan -->
  <ul class="navbar-nav ml-auto">
    <!-- Fullscreen -->
    <li class="nav-item">
      <a class="nav-link text-white" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

    <!-- User Dropdown -->
    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="{{ asset ('public/image/kementan.png') }}" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline text-white">{{ Auth::user()->name }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <li class="user-header " style="height: 100px;">
          <img src="{{ asset ('public//image/kementan.png') }}" style="height: 40px; width:40px" class="img-circle elevation-2" alt="User Image">
          <p>{{ Auth::user()->name }}</p>
        </li>

        <li class="user-footer">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>

          <a href="#" class="btn btn-default btn-flat text-danger float-right"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i> Logout
          </a>
      </li>
      </ul>
    </li>
  </ul>
</nav>

