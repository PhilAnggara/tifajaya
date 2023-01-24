<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tifajaya</title>

  @inject('carbon', 'Carbon\Carbon')
  @include('includes.style')
  <link rel="stylesheet" href="{{ url('frontend/styles/home.css') }}">
  @livewireStyles

</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a data-aos="fade-down" class="navbar-brand" href="{{ route('index') }}">Tifajaya</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a data-aos="fade-down" class="nav-link btn btn-outline-primary px-3 my-btn" href="{{ route('beranda') }}">ADMIN</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container text-center content">
    <h1 data-aos="zoom-in" class="display-4">Tifajaya</h1>
    <p data-aos="zoom-in" data-aos-delay="150" class="lead">
      Kementerian Pekerjaan Umum dan Perumahan Rakyat Direktorat Jendral Bina Marga Balai Pelaksanaan Jalan Nasional Jayapura - Laboratorium Pengujian
    </p>
    <div data-aos="zoom-in" data-aos-delay="300" class="input-group mb-3 mx-auto">
      <input type="text" class="form-control" placeholder="Masukan Nomor Token" autofocus>
      <button class="btn btn-primary my-btn-primary" type="button">
        <i class="far fa-print-magnifying-glass"></i>
      </button>
    </div>
  </div>


  @include('includes.script')
  @include('sweetalert::alert')
  @livewireScripts

</body>
</html>