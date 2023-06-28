@extends('layouts.app')
@section('title', 'Beranda Admin')

@section('content')
<div class="main-content container-fluid">
  <div data-aos="fade-right" class="page-title">
    <div class="row">
      <div class="col-12 col-md-6">
        <h3>VSM</h3>
        <p class="text-subtitle text-muted">Pencarian dokumen menggunakan algoritma VSM (Vector Space Model)</p>
      </div>
      <div class="col-12 col-md-6 text-end">
        <button class="btn icon icon-left btn-primary round" data-bs-toggle="modal" data-bs-target="#upload">
          <i class="fal fa-file-arrow-up"></i>
          Unggah Dokumen
        </button>
      </div>
    </div>
  </div>
  <section class="section mt-4">
    
    @livewire('search')

  </section>
</div>
@include('includes.modals.modal-vsm')
@endsection


@push('addon-style')
<link rel="stylesheet" href="{{ url('frontend/styles/loading.css') }}">
@endpush

@push('addon-script')
<script>
  // click button when press enter
  document.getElementById('query').addEventListener('keyup', function(event) {
    if (event.keyCode === 13) {
      event.preventDefault();
      document.getElementById('search').click();
    }
  });
</script>
@endpush