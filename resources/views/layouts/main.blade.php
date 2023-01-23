<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  @inject('carbon', 'Carbon\Carbon')
  @stack('prepend-style')
  
  <link rel="stylesheet" href="{{ url('main-frontend/frontend/libraries/bootstrap/css/bootstrap.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200;300;400;600;700;800&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ url('frontend/vendors/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta1/css/all.css">
  <link rel="stylesheet" href="{{ url('main-frontend/frontend/libraries/animate/animate.css') }}">
  <link rel="stylesheet" href="{{ url('main-frontend/frontend/styles/main.css') }}">

  @livewireStyles
  @stack('addon-style')

</head>
<body>

  @yield('content')

  @stack('prepend-script')
  
  <script src="{{ url('main-frontend/frontend/libraries/jquery/jquery-3.5.1.min.js') }}"></script>
  <script src="{{ url('main-frontend/frontend/libraries/bootstrap/js/bootstrap.js') }}"></script>
  <script src="{{ url('main-frontend/frontend/libraries/retina/retina.min.js') }}"></script>
  <script src="{{ url('main-frontend/frontend/libraries/ztext/ztext.min.js') }}"></script>
  <script>
    var ztxt = new Ztextify(".ztext", {
      depth: "20px",
      layers: 10,
      fade: true,
      direction: "forwards",
      event: "pointer",
      eventRotation: "20deg"
    });
  </script>

  @include('sweetalert::alert')
  @livewireScripts
  @stack('addon-script')
  
</body>
</html>