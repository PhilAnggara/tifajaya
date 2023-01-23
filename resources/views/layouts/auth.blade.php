<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  <link rel="shortcut icon" href="{{ url('frontend/images/favicon.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="{{ url('src/assets/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ url('src/assets/css/app.css') }}">
  
  <link rel="stylesheet" href="{{ url('frontend/styles/main.css') }}">

</head>
<body>

  <div id="auth">
    <div class="container">
      <div class="row">
        @yield('content')
      </div>
    </div>
  </div>
  
  <script src="{{ url('src/assets/js/feather-icons/feather.min.js') }}"></script>
  <script src="{{ url('src/assets/js/app.js') }}"></script>
  <script src="{{ url('src/assets/js/main.js') }}"></script>
  
</body>
</html>