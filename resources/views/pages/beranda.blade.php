@extends('layouts.app')
@section('title', 'Tifajaya')

@section('content')
<div class="main-content container-fluid">
  <div data-aos="fade-right" class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Beranda</h3>
      </div>
    </div>
  </div>
  <section class="section mt-4">
    <div data-aos="zoom-in" class="card">
      <div class="card-body">
        <div id="map"></div>
      </div>
    </div>

  </section>
</div>
@endsection


@push('addon-style')
@endpush

@push('addon-script')
@endpush