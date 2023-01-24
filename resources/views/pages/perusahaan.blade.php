@extends('layouts.app')
@section('title', 'Daftar Perusahaan - Tifajaya')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="main-content container-fluid">
  <div data-aos="fade-right" class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Daftar Perushaan</h3>
      </div>
    </div>
  </div>
  <section class="section mt-4">
    <div data-aos="zoom-in" class="card">
      <div class="card-header d-flex justify-content-end">
        <button class="btn icon icon-left btn-success" data-bs-toggle="modal" data-bs-target="#tambahDataModal">
          <i class="fal fa-plus"></i>
          Tambah
        </button>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class='table table-hover border text-center table-striped text-nowrap' id="myTable">
            <thead>
              <tr>
                <th>Nama Perusahaan</th>
                <th>No. Token</th>
                <th>Tanggal</th>
                <th>No. Telp</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
                <tr>
                  <td>{{ $item->nama_perusahaan }}</td>
                  <td>
                    <button class="btn btn-sm icon icon-left btn-outline-secondary" onclick="copyToClipboard('{{ $item->token }}')">
                      <i class="fal fa-clipboard"></i>
                      {{ $item->token }}
                    </button>
                  </td>
                  <td>
                    <i class="fal fa-calendar-day text-danger"></i>
                    {{ $carbon::parse($item->tgl_daftar)->isoFormat('D MMMM YYYY') }}
                  </td>
                  <td>
                    <span class="badge bg-light rounded">
                      <i class="fal fa-phone"></i>
                      {{ $item->telp }}
                    </span>
                  </td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      <button type="button" class="btn icon btn-info">
                        <i class="fal fa-eye" data-toggle="tooltip" title="Lihat Detail"></i>
                      </button>
                      <button type="button" class="btn icon btn-primary">
                        <i class="fal fa-edit" data-toggle="tooltip" title="Ubah"></i>
                      </button>
                      <button type="button" class="btn icon btn-danger">
                        <i class="fal fa-trash-alt" data-toggle="tooltip" title="Hapus"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </section>
</div>
@endsection


@push('addon-style')
@endpush

@push('addon-script')
@endpush