<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard-data/mahasiswa*') ? 'active' : '' }}" aria-current="page" href="/dashboard-data/mahasiswa">
            <span data-feather="file" class="align-text-bottom"></span>
            Data Mahasiswa
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/mahasiswa*') ? 'active' : '' }}" href="/dashboard/mahasiswa">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Data Mahasiswa Ajax
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard-lumen/mahasiswa*') ? 'active' : '' }}" href="/dashboard-lumen/mahasiswa">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Data Mahasiswa API Lumen
          </a>
        </li>
      </ul>

    </div>
  </nav>