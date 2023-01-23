@extends('layouts.app')
@section('title', 'Tifajaya')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="main-content container-fluid">
  <div data-aos="fade-right" class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Kelola Pengguna</h3>
      </div>
    </div>
  </div>
  <section class="section mt-4">
    
    <div class="row row-cols-1 row-cols-md-4 g-4">
      @php($aosDelay = 100)
      <div class="col">
        <div data-aos="zoom-in" data-aos-delay="{{ $aosDelay }}" class="card h-100 card-plus h-card h-350 b-rad">
          <div class="card-body d-flex justify-content-center">
            <i class="fas fa-user-plus fa-7x"></i>
            <a href="#" data-bs-toggle="modal" data-bs-target="#tambah" class="stretched-link"></a>
          </div>
        </div>
      </div>

      @foreach ($items as $item)
        @php($aosDelay += 100)
        <div class="col">
          <div data-aos="zoom-in" data-aos-delay="{{ $aosDelay }}" class="card h-100 h-card-img h-350 b-rad">
            <img src="https://ui-avatars.com/api/?background=00008C&color=FFF311&bold=true&name={{ $item->name }}" class="card-img-top" class="card-img-top">
            <div class="card-body">
              <button class="btn btn-sm btn-light icon icon-left rounded-pill h-show" data-bs-toggle="modal" data-bs-target="#edit-{{ $item->id }}">
                <i class="fal fa-pen-to-square"></i>
                Edit
              </button>
              <h5 class="card-title">
                {{ $item->name }}
                @if ($item->id == Auth::user()->id)
                  <small class="text-muted">(Anda)</small>
                @endif
              </h5>
              <p class="card-text d-flex justify-content-between">
                {{ $item->email }}
                @if ($item->role == 'Admin')
                    <span class="badge bg-success">
                      <i class="fal fa-user-gear"></i>
                      Admin
                    </span>
                  @elseif ($item->role == 'Kepala Seksi')
                    <span class="badge bg-primary">
                      <i class="fal fa-user-tie"></i>
                      Kepala Seksi
                    </span>
                  @else
                    <span class="badge bg-secondary">
                      <i class="fal fa-user-shield"></i>
                      Kepala Lab
                    </span>
                  @endif
                </p>
            </div>
            <div class="card-footer py-2 px-2 text-center">
              <button class="btn btn-sm icon icon-left" data-bs-toggle="modal" data-bs-target="#reset-{{ $item->id }}">
                <i class="fal fa-lock-keyhole"></i>
                Reset Password
              </button>
              <button class="btn btn-sm icon icon-left" onclick="hapusData({{ $item->id }}, 'Hapus Pengguna', 'Yakin ingin menghapus {{ $item->name }}?')">
                <i class="fal fa-user-minus"></i>
                Hapus Admin
              </button>
              <form action="{{ route('kelola-pengguna.destroy', $item->id) }}" id="hapus-{{ $item->id }}" method="POST">
                @method('delete')
                @csrf
              </form>
            </div>
          </div>
        </div>
      @endforeach

    </div>

  </section>
</div>
@include('includes.modals.modal-pengguna')
@endsection


@push('addon-style')
@endpush

@push('addon-script')
  @if ($errors->any())
  <script>
    Swal.fire({
      title: 'Ups, ada yang tidak beres!',
      text: "Periksa kembail inputan anda.",
      icon: 'error',
      confirmButtonColor: '#00008C'
    })
  </script>
  @endif
@endpush