<div>

  <div class="row">

    <div class="col-12">
      <div class="input-group mb-3 mx-auto">
        <input wire:model="token" type="text" class="form-control" id="token" placeholder="Masukan Nomor Token" autofocus>
        <button wire:click="search" class="btn btn-primary my-btn-primary" id="searchToken" type="submit">
          <i class="far fa-print-magnifying-glass"></i>
        </button>
      </div>
    </div>

    <div wire:loading wire:target="search" class="col-12">
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
      <div wire:loading.remove wire:target="search" class="col-12">
        <div class="card shadow-sm mt-5">
          <div class="card-body">
            <h5 class="card-title">{{ $item->nama_perusahaan }}</h5>
            <p class="card-text">{{ $item->token }}</p>
          </div>
        </div>
      </div>
    @elseif ($status == 'not found')
      <div wire:loading.remove wire:target="search" class="col-12">
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