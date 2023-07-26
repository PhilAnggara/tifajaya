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

<div class="uploadLoading d-none" id="uploadLoading">
  <img src="{{ url('main-frontend/frontend/images/ball-triangle.svg') }}" alt="">
</div>

@include('includes.modals.modal-vsm')
@endsection


@push('addon-style')
<link rel="stylesheet" href="{{ url('frontend/styles/loading.css') }}">
<style>
  .uploadLoading {
    width: 100%;
    height: 100%;
    position: fixed;  
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9999;
  }
  .uploadLoading img {
    height: 100px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>
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

  document.getElementById("uploadForm").addEventListener("submit", function(event) {
    var fileInput = document.querySelector('input[type="file"]');
    var fileCount = fileInput.files.length;
    // Insert the number of files into the hidden input field
    document.getElementById('fileCount').value = fileCount;
    event.preventDefault();
    var element = document.getElementById("uploadLoading");
    // Remove the d-none class
    element.classList.remove("d-none");
    this.submit();
  });
</script>

@if (session('error'))
  <script>
    Swal.fire({
      icon: 'error',
      title: '{{ session('error') }}',
    })
  </script>
@endif
@endpush