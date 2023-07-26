<div>
  @inject('carbon', 'Carbon\Carbon')

  <div wire:ignore>
    @if (session()->has('notPdf'))
      <div data-aos="zoom-in" class="row justify-content-center">
        <div class="col-12">
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="far fa-circle-info"></i>
            {{ session('notPdf') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
      </div>
    @endif

    <div data-aos="zoom-in" data-aos-delay="200"  class="card rounded-pill">
      <div class="card-body">
        <div class="input-group">
          <input wire:model="query" type="text" class="form-control form-control form-control-lg round px-4" id="query" placeholder="Cari dokumen..." autofocus autocomplete="off">
          <button wire:click="search" class="btn btn-outline-primary round" id="search" type="button">
            <i class="fad fa-magnifying-glass"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div wire:loading wire:target="search">
      <div class="d-flex justify-content-center align-items-center mt-5">
        <div class="la-line-scale-party la-dark la-3x">
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
    <div wire:loading.remove wire:target="search" class="row justify-content-center">
      <div class="col-8">
        <div class="card rounded-pill text-white bg-light mb-3">
          <div class="card-body ms-4">
            <p class="mb-0">
              <i class="far fa-circle-info"></i>
              Menemukan {{ $results->count() }} hasil
            </p>
            @if ($showPrecisionAndRecall)
              <p class="mb-0 mt-2"><strong>Presisi</strong> : {{ $precision['precisionStr'] }} <strong>{{ number_format($precision['precision'], 2) }}</strong></p>
              <p class="mb-0"><strong>Recall</strong> : {{ $recall['recallStr'] }} <strong>{{ number_format($recall['recall'], 2) }}</strong></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @php($aosDelay = 0)
    @foreach ($results as $result)
      @php($aosDelay += 100)
      <div wire:loading.remove wire:target="search" class="row justify-content-center">
        <div class="col-8">
          {{-- {{ $loop->iteration }} --}}
          <div class="card mb-3">
            <div class="card-body">
              <div class="d-flex position-relative">
                <div class="bg-primary rounded-3 me-3 d-flex justify-content-center align-items-center">
                  <i class="far fa-file-pdf fa-2xl mx-3 mt-3 text-white"></i>
                </div>
                <div>
                  <h5 class="card-title">{{ $result->nama_file }}</h5>
                  <a href="{{ Storage::url($result->path) }}" target="_blank" class="stretched-link"></a>
                  <p class="card-text text-muted">{{ $carbon::parse($result->created_at)->isoFormat('D MMMM YYYY') }}</p>
                </div>
                {{--
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                  {{ number_format($result->cosineSimilarity, 3) }}
                </span>
                --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- @if ($loop->iteration == 10)
        @break
      @endif --}}
    @endforeach
  @elseif ($status == 'not found')
    <div wire:loading.remove wire:target="search" class="row justify-content-center">
      <div class="col-6">
        <div class="card rounded-pill mb-3">
          <div class="card-body">
            <p class="card-text text-muted text-center">
              <i class="far fa-circle-info"></i>
              Dokumen tidak ditemukan
            </p>
          </div>
        </div>
      </div>
    </div>
  @elseif ($status == 'empty')
    <div wire:loading.remove wire:target="search" class="row justify-content-center">
      <div class="col-6">
        <div class="card rounded-pill mb-3">
          <div class="card-body">
            <p class="card-text text-muted text-center">
              <i class="far fa-circle-info"></i>
              Masukan kata kunci untuk melakukan pencarian
            </p>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>