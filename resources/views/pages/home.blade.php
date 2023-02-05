<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tifajaya</title>

  @inject('carbon', 'Carbon\Carbon')
  @include('includes.style')
  <script src="{{ url('frontend/vendors/typed/typed.js') }}"></script>
  <link rel="stylesheet" href="{{ url('frontend/styles/home.css') }}">
  <link rel="stylesheet" href="{{ url('frontend/styles/loading.css') }}">
  {{-- <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script> --}}
  @livewireStyles

</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
      <a data-aos="fade-down" class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ url('frontend/images/navbar-brand.png') }}" class="d-inline-block align-text-top brand">
        Tifajaya
      </a>
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
  
  <div class="jumbotron text-center container">
    {{-- <h1 class="display-4">Tifajaya</h1> --}}
    <h1 class="display-4"><span id="typed"></span></h1>
    <p class="lead" data-aos="flip-up">
      Kementerian Pekerjaan Umum dan Perumahan Rakyat Direktorat Jendral Bina Marga Balai Pelaksanaan Jalan Nasional Jayapura - Laboratorium Pengujian
    </p>
  </div>

  <div class="container">

    @livewire('search-token')

  </div>


  <script>
    var typed = new Typed('#typed', {
      strings: [
        'Tifajaya',
        'Kementerian <strong>PUPR</strong>'
      ],
      // startDelay: 200,
      typeSpeed: 15,
      backSpeed: 15,
      backDelay: 3000,
      loop: true,
      // loopCount: Infinity,
    });
  </script>
  
  @include('includes.script')
  @include('sweetalert::alert')
  @livewireScripts

  <script>
    // click button when press enter
    document.getElementById('token').addEventListener('keyup', function(event) {
      if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById('searchToken').click();
      }
    });
  </script>

</body>
</html>