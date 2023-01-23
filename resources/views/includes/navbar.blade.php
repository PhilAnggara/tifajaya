<nav class="navbar navbar-header navbar-expand navbar-light">
  <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
  <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
      <li class="dropdown nav-icon">
        <a href="#" data-bs-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
          <div class="d-lg-inline-block">
            <i data-feather="bell"></i>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
          <h6 class='py-2 px-4'>Notifikasi</h6>
          <ul class="list-group rounded-none">
            <li class="list-group-item border-0 align-items-start">
              <div class="avatar bg-success me-3">
                <span class="avatar-content">
                  <i class="far fa-memo"></i>
                </span>
              </div>
              <div>
                <h6 class='text-bold'>Surat Pengantar Diunggah</h6>
                <p class='text-xs'>
                  {{ $carbon::parse($carbon::now())->isoFormat('D MMMM YYYY') }}
                </p>
              </div>
            </li>
          </ul>
        </div>
      </li>
      @auth
      <li class="dropdown">
        <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <div class="avatar me-1">
            <img src="https://ui-avatars.com/api/?background=00008C&color=FFF311&bold=true&name={{ auth()->user()->name }}">
          </div>
          <div class="d-none d-md-block d-lg-inline-block">Hai, {{ Str::before(auth()->user()->name, ' ') }}</div>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
          {{-- <a class="dropdown-item active" href="{{ route('kelola-pengguna.index') }}">
            <i data-feather="user"></i>
            Akun
          </a>
          <div class="dropdown-divider"></div> --}}
          <a class="dropdown-item" href="#" onclick="keluar()">
            <i data-feather="log-out"></i>
            Keluar
          </a>
          <form action="{{ route('logout') }}" id="keluar" method="POST">
            @csrf
          </form>
        </div>
      </li>
      @endauth
    </ul>
  </div>
</nav>