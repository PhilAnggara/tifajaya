@extends('layouts.auth')
@section('title', 'Masuk - Tifajaya')

@section('content')
<div class="col-md-5 col-sm-12 mx-auto">
  <div class="card pt-4">
    <div class="card-body">
      <div class="text-center mb-5">
        <img src="{{ url('frontend/images/logo.png') }}" height="48" class='mb-4'>
        <h3>BPJN Jayapura</h3>
        <p>Silahkan masuk untuk melanjutkan ke Tifajaya.</p>
      </div>
      <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group position-relative has-icon-left">
          <label for="username">Username</label>
          <div class="position-relative">
            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>
            <div class="form-control-icon @error('username') invisible @enderror">
              <i data-feather="user"></i>
            </div>
            @error('username')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class="form-group position-relative has-icon-left">
          <div class="clearfix">
            <label for="password">Kata Sandi</label>
          </div>
          <div class="position-relative">
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="off">
            <div class="form-control-icon @error('password') invisible @enderror">
              <i data-feather="lock"></i>
            </div>
            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>

        <div class='form-check clearfix my-4'>
          <div class="checkbox float-start">
            <input type="checkbox" id="remember" class="form-check-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">Ingat Saya</label>
          </div>
        </div>
        <div class="clearfix">
          <button type="submit" class="btn btn-primary float-end">Masuk</button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection


@push('addon-style')
@endpush

@push('addon-script')
@endpush