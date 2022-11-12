<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          {{-- {{ Request::is('dashboard') ? 'active' : ''}} : salah satu cara untuk menambahkan class active --}}
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/jurusan*') ? 'active' : ''}}" href="/dashboard/jurusan">
            <span data-feather="book-open" class="align-text-bottom"></span>
            Jurusan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/siswa*') ? 'active' : ''}}" href="/dashboard/siswa">
            <span data-feather="user" class="align-text-bottom"></span>
            Siswa
          </a>
        </li>
      </ul>
    </div>
  </nav>