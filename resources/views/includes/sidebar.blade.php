<div id="sidebar" class='active'>
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      {{-- <img src="{{ url('frontend/images/logo.png') }}" alt="" srcset=""> --}}
      <a href="{{ route('beranda') }}" class="brand">
        <h1>BPJN</h1>
        <h2>Jayapura</h2>
      </a>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">

        <li class='sidebar-title'>Menu</li>

        <li class="sidebar-item {{ Request::is('admin') ? 'active' : '' }}">
          <a href="{{ route('beranda') }}" class='sidebar-link'>
            <i class="far fa-home"></i>
            <span>Beranda</span>
          </a>
        </li>

        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Kepala Seksi')
          <li class="sidebar-item {{ Request::is('admin/perusahaan') ? 'active' : '' }}">
            <a href="{{ route('perusahaan.index') }}" class='sidebar-link'>
              <i class="far fa-buildings"></i>
              <span>Daftar Perusahaan</span>
            </a>
          </li>
        @endif

        <li class="sidebar-item {{ Request::is('admin/surat-perintah-pengujian') ? 'active' : '' }}">
          <a href="{{ route('surat-perintah-pengujian') }}" class='sidebar-link'>
            <i class="far fa-memo-circle-check"></i>
            <span>Surat Perintah Pengujian</span>
          </a>
        </li>

        {{-- @if (auth()->user()->role == 'Kepala Seksi' || auth()->user()->role == 'Kepala Lab') --}}
          <li class="sidebar-item {{ Request::is('admin/pengujiaan') ? 'active' : '' }}">
            <a href="{{ route('pengujiaan') }}" class='sidebar-link'>
              <i class="far fa-list-check"></i>
              <span>Pengujian</span>
            </a>
          </li>
        {{-- @endif --}}

        <li class="sidebar-item {{ Request::is('admin/laporan-pengujian') ? 'active' : '' }}">
          <a href="{{ route('laporan-pengujian') }}" class='sidebar-link'>
            <i class="far fa-file-chart-column"></i>
            <span>Laporan Pengujian</span>
          </a>
        </li>

        <li class="sidebar-item {{ Request::is('admin/surat-pengantar-pengujian') ? 'active' : '' }}">
          <a href="{{ route('surat-pengantar-pengujian') }}" class='sidebar-link'>
            <i class="far fa-memo"></i>
            <span>Surat Pengantar Pengujian</span>
          </a>
        </li>

        @if (auth()->user()->role == 'Kepala Seksi')
          <li class="sidebar-item {{ Request::is('admin/kelola-pengguna') ? 'active' : '' }}">
            <a href="{{ route('kelola-pengguna.index') }}" class='sidebar-link'>
              <i class="far fa-users"></i>
              <span>Kelola Pengguna</span>
            </a>
          </li>
        @endif

      </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>