<div>

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
            <p class="card-text">Pengujian Beton</p>
            <div class="progress progress-primary mb-4">
              <div class="progress-bar progress-label" role="progressbar" style="width: 35%"  aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
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
                  <tr>
                    <td>Properties Material URBIS - URPIL, KLS A,B,S</td>
                    <td class="text-start">
                      <i class="far fa-calendar-day text-info"></i>
                      18 Maret 2022
                       - 
                       <i class="far fa-calendar-day text-dark"></i>
                       27 Maret 2022
                    </td>
                    <td>
                      <span class="badge bg-success">
                        <i class="fal fa-circle-check"></i>
                        Berhasil
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>Properties Material CTB-CTSB</td>
                    <td class="text-start">
                      <i class="far fa-calendar-day text-info"></i>
                      18 Maret 2022
                    </td>
                    <td>
                      <span class="badge bg-primary">
                        <i class="fal fa-spinner"></i>
                        Sedang Berjalan
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>Properties Material SOIL - Alam Lokal</td>
                    <td class="text-start">
                      
                    </td>
                    <td>
                      <span class="badge bg-light">
                        <i class="fal fa-circle-minus"></i>
                        Belum Dikerjakan
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
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

</div>