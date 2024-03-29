@extends('layouts.app')
@section('title', 'Pengujian')
@inject('carbon', 'Carbon\Carbon')

@section('content')
<div class="main-content container-fluid">
  <div data-aos="fade-right" class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Pengujian</h3>
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
                    <button class="btn icon icon-left btn-{{ $item->progress() == 100 ? 'success' : 'primary' }} btn-sm" data-bs-toggle="modal" data-bs-target="#pengujian-{{ $item->id }}">
                      <i class="fal fa-list-check"></i>
                      Pengujian
                    </button>
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
@include('includes.modals.modal-pengujian')
@endsection


@push('addon-style')
@endpush

@push('addon-script')
@endpush