<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ url('/dashboard') }}">
          <span data-feather="home" class="align-text-bottom"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="{{ url('/dashboard/posts') }}"> {{-- /post* semua link akan aktif dibawah url post --}}
          <span data-feather="file-text" class="align-text-bottom"></span>
          My Post
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/agendas*') ? 'active' : '' }}" href="{{ url('/dashboard/agendas') }}"> {{-- /post* semua link akan aktif dibawah url post --}}
          <span data-feather="file-text" class="align-text-bottom"></span>
          Agenda Kegiatan
        </a>
      </li>
    </ul>

    @can('admin')
    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>ADMINISTRATOR</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="{{ url('/dashboard/categories') }}"> {{-- /post* semua link akan aktif dibawah url post --}}
          <span data-feather="grid" class="align-text-bottom"></span>
          Post Categories
        </a>
      </li>
    </ul>
    @endcan
  </div>
</nav>