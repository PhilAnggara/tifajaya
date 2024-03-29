<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIKLOP LAB</title>

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
        SIKLOP LAB
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a data-aos="fade-down" class="nav-link text-center pt-3 me-md-3 text-white" data-bs-toggle="modal" data-bs-target="#harga" href="">HARGA PENGUJIAN</a>
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
  @include('includes.modals.modal-home')


  <script>
    var typed = new Typed('#typed', {
      strings: [
        'SIKLOP LAB',
        // 'Kementerian <strong>PUPR</strong>'
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
  <script src="{{ url('frontend/vendors/jquery/jquery-3.6.0.js') }}"></script>

  <script>
    // click button when press enter
    document.getElementById('token').addEventListener('keyup', function(event) {
      if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById('searchToken').click();
      }
    });

    // close the modal when livewire browser event is fired using vanilla js
    window.addEventListener('terkirim', event => {
      $('#kusioner').modal('hide');
      console.log('Berhasil terkirim');
      Swal.fire({
        title: 'Respon anda berhasil dikirim!',
        icon: 'success',
      });
    })
  </script>

</body>
</html>