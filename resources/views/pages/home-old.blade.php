@extends('layouts.main')
@section('title', 'Tifajaya')

@section('content')
	<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="">Tifajaya</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link btn btn-outline-primary tombol mr-2 px-3 mt-2" href="{{ route('beranda') }}">Admin</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- End of navbar -->

  <!-- Jumbotron -->
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4 ztext animate__animated animate__slideInDown animate__fast">Tifajaya</h1>
      <p class="lead animate__animated animate__fadeInUp animate__dua">Kementerian Pekerjaan Umum dan Perumahan Rakyat Direktorat Jendral Bina Marga</p>
      <div class="row justify-content-center animate__animated animate__fadeInUp">
        <form class="form-inline" action="pencarian.html">
          <input class="form-control" type="search" placeholder="Masukan Nomor Token" aria-label="Search" autofocus>
          <button class="btn btn-primary tombol-primary my-2 my-sm-0" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </form>
      </div>    
    </div>
  </div>
  <!-- End of jumbotron -->
@endsection


@push('addon-style')
@endpush

@push('addon-script')
@endpush