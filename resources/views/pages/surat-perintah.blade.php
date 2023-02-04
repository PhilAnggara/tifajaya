@extends('layouts.app')
@section('title', 'Surat Perintah Pengujian - Tifajaya')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="main-content container-fluid">
  <div data-aos="fade-right" class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Surat Perintah Pengajuan</h3>
      </div>
    </div>
  </div>
  <section class="section mt-4">
    <div data-aos="zoom-in" class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table class='table table-hover border text-center table-striped text-nowrap' id="myTable">
            <thead>
              <tr>
                <th>Nama Perusahaan</th>
                <th>No. Token</th>
                <th>No. Surat</th>
                <th>Jenis Pengujian</th>
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
                    <button class="btn btn-sm icon icon-left btn-outline-dark round" onclick="copyToClipboard('{{ $item->detail->no_surat }}')">
                      <i class="fal fa-clipboard"></i>
                      {{ $item->detail->no_surat }}
                    </button>
                  </td>
                  <td>
                    <span class="badge bg-light text-uppercase">{{ $item->jenisPengujian()->jenis }}</span>
                  </td>
                  <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                      @if ($item->detail->surat_perintah)
                        <a href="{{ Storage::url($item->detail->surat_perintah) }}" target="_blank" class="btn icon btn-primary">
                          <i class="fal fa-print" data-toggle="tooltip" title="Cetak"></i>
                        </a>
                      @else
                        <a href="{{ Storage::url('files/sample-1.pdf') }}" target="_blank" class="btn icon btn-primary">
                          <i class="fal fa-print" data-toggle="tooltip" title="Cetak"></i>
                        </a>
                      @endif
                      <button type="button" class="btn icon btn-info" data-bs-toggle="modal" data-bs-target="#upload-{{ $item->id }}">
                        <i class="fal fa-arrow-up-from-bracket" data-toggle="tooltip" title="Upload"></i>
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
@include('includes.modals.modal-surat-perintah')
@endsection


@push('addon-style')
@endpush

@push('addon-script')
@endpush