<div>
  @inject('carbon', 'Carbon\Carbon')

  <div class="row justify-content-center">

    <div class="col-12">
      <div class="input-group mb-md-3 mx-auto">
        <input wire:model="token" type="text" class="form-control" id="token" placeholder="Masukan Nomor Token" autofocus>
        <button wire:click="search" class="btn btn-primary my-btn-primary" id="searchToken" type="submit">
          <i class="far fa-print-magnifying-glass"></i>
        </button>
      </div>
    </div>

    <div wire:loading wire:target="search" class="col-md-10">
      <div class="card shadow-sm mt-5 fix-h">
        <div class="card-body d-flex justify-content-center align-items-center">
          <div class="la-line-scale-party la-dark la-2x">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
      </div>
    </div>
  
    @if ($status == 'found')
      <div wire:loading.remove wire:target="search" class="col-md-10">
        <div class="card shadow-sm mt-5">
          <div class="card-body">
            <h5 class="card-title">
              {{ $item->nama_perusahaan }}
              <small class="text-muted">( {{ $item->token }} )</small>
            </h5>
            <p class="card-text">Pengujian {{ $item->jenisPengujian()->jenis }}</p>
            <div class="progress progress-{{ $item->progress() == 100 ? 'primary' : 'info' }} mb-4">
              <div class="progress-bar progress-label" role="progressbar" style="width: {{ $item->progress() }}%"  aria-valuenow="{{ $item->progress() }}" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="table-responsive">
              <table class='table table-hover border text-center table-striped text-nowrap' id="myTable">
                <thead>
                  <tr>
                    <th>Tahapan</th>
                    <th>Tanggal Pengujian</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($item->pengujian as $pengujian)
                    <tr>
                      <td>{{ $pengujian->tahap->tahapan }}</td>
                      <td class="text-start">
                        @if ($pengujian->mulai)
                          <i class="far fa-calendar-day text-info"></i>
                          {{ $carbon::parse($pengujian->mulai)->isoFormat('D MMMM YYYY') }}
                          - 
                        @endif
                        @if ($pengujian->selesai)
                          <i class="far fa-calendar-day text-dark"></i>
                          {{ $carbon::parse($pengujian->selesai)->isoFormat('D MMMM YYYY') }}
                        @endif
                      </td>
                      <td>
                        @if ($pengujian->status == 0)
                          <span class="badge bg-light">
                            <i class="fal fa-circle-minus"></i>
                            Belum Dikerjakan
                          </span>
                        @elseif ($pengujian->status == 1)
                          <span class="badge bg-primary">
                            <i class="fal fa-spinner"></i>
                            Sedang Berjalan
                          </span>
                        @elseif ($pengujian->status == 2)
                          <span class="badge bg-success">
                            <i class="fal fa-circle-check"></i>
                            Berhasil
                          </span>
                        @else
                          <span class="badge bg-danger">
                            <i class="fal fa-circle-xmark"></i>
                            Menunggu Material Pengganti
                          </span>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @if ($item->progress() == 100)
              @if (!$item->response)
                <small class="text-muted d-block">
                  <i class="fal fa-circle-info"></i>
                  Silahkan mengisi kusioner sebelum mendownload Laporan dan SPP
                </small>
                <div class="text-center">
                  <button class="btn btn-sm icon icon-left btn-outline-primary" data-bs-toggle="modal" data-bs-target="#kusioner">
                    <i class="fal fa-list-ol"></i>
                    Isi kusioner
                  </button>
                </div>
              @else
                <div class="d-flex justify-content-center">
                  @if ($item->detail->laporan)
                    <div class="text-center me-2">
                      <a href="{{ Storage::url($item->detail->laporan) }}" target="_blank" class="btn btn-sm icon icon-left btn-primary">
                        <i class="fal fa-file-arrow-down"></i>
                        Donwload Laporan
                      </a>
                    </div>
                  @else
                    <span class="badge bg-light me-2">
                      <i class="fal fa-circle-info"></i>
                      Laporan Belum di Unggah
                    </span>
                  @endif
                  @if ($item->detail->surat_pengantar)
                    <div class="text-center">
                      <a href="{{ Storage::url($item->detail->surat_pengantar) }}" target="_blank" class="btn btn-sm icon icon-left btn-info">
                        <i class="fal fa-file-arrow-down"></i>
                        Donwload SPP
                      </a>
                    </div>
                  @else
                    <span class="badge bg-light me-2">
                      <i class="fal fa-circle-info"></i>
                      SPP Belum di Unggah
                    </span>
                  @endif
                </div>
              @endif
            @endif
          </div>
        </div>
      </div>

    @elseif ($status == 'not found')
      <div wire:loading.remove wire:target="search" class="col-md-10">
        <div class="card shadow-sm mt-5 fix-h">
          <div class="card-body text-center">
            <h5 class="card-title mt-5">
              <i class="far fa-circle-info fa-lg"></i>
              Data tidak ditemukan
            </h5>
            <p class="card-text">Coba periksa kembali token yang anda masukan</p>
          </div>
        </div>
      </div>
    @endif

  </div>

  @include('includes.modals.modal-kusioner')

</div>