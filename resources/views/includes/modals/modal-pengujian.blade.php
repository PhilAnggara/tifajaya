@foreach ($items as $item)
  <div class="modal fade text-left" id="pengujian-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel1">Pengujian {{ $item->jenisPengujian()->jenis }} ({{ $item->token }})</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <div class="modal-body">

          <div class="mt-4 progress progress-{{ $item->progress() == 100 ? 'primary' : 'info' }} mb-4">
            <div class="progress-bar progress-label" role="progressbar" style="width: {{ $item->progress() }}%"  aria-valuenow="{{ $item->progress() }}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="table-responsive">
            <table class='table table-hover border text-center table-striped text-nowrap'>
              <thead>
                <tr>
                  <th>Tahapan</th>
                  <th>Tanggal Pengujian</th>
                  <th>Status</th>
                  <th></th>
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
                          Gagal
                        </span>
                      @endif
                    </td>
                    <td>
                      @if ($pengujian->status == 0 && $pengujian->qualifiedToRun())
                        <button class="btn icon icon-left btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mulai-{{ $item->id }}-{{ $pengujian->id }}">
                          <i class="fal fa-play" data-toggle="tooltip" title="Mulai"></i>
                          {{-- <i class="fal fa-play"></i>
                          Mulai --}}
                        </button>
                      @elseif ($pengujian->status == 1)
                        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                          <button type="button" class="btn icon btn-success" data-bs-toggle="modal" data-bs-target="#berhasil-{{ $item->id }}-{{ $pengujian->id }}">
                            <i class="fal fa-circle-check" data-toggle="tooltip" title="Berhasil"></i>
                          </button>
                          <button type="button" class="btn icon btn-danger" data-bs-toggle="modal" data-bs-target="#gagal-{{ $item->id }}-{{ $pengujian->id }}">
                            <i class="fal fa-circle-xmark" data-toggle="tooltip" title="Gagal"></i>
                          </button>
                        </div>
                      @elseif ($pengujian->status == 2)
                        <button class="btn icon icon-left btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-{{ $item->id }}-{{ $pengujian->id }}">
                          <i class="fal fa-edit" data-toggle="tooltip" title="Edit"></i>
                        </button>
                      @elseif ($pengujian->status == 3)
                        <button class="btn icon icon-left btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#berhasil-{{ $item->id }}-{{ $pengujian->id }}">
                          <i class="fal fa-circle-check" data-toggle="tooltip" title="Berhasil"></i>
                        </button>
                      @endif
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>

  @foreach ($item->pengujian as $pengujian)
    {{-- Mulai --}}
    <div class="modal fade text-left" id="mulai-{{ $item->id }}-{{ $pengujian->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Mulai Pengujian</h5>
            <button type="button" class="close rounded-pill" data-bs-toggle="modal" data-bs-target="#pengujian-{{ $item->id }}" aria-label="Close">
              <i data-feather="x"></i>
            </button>
          </div>
          <form action="{{ route('update-pengujiaan', $pengujian->id) }}" method="post">
            @method('PUT')
            @csrf
            <input type="hidden" name="status" value="1">
            <div class="modal-body">

              <p class="text-muted fw-bold">{{ $pengujian->tahap->tahapan }}</p>
              
              <div class="mb-2">
                <label for="mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control @error('mulai') is-invalid @enderror" value="{{ old('mulai') }}" id="mulai" name="mulai" required>
                @error('mulai')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#pengujian-{{ $item->id }}">Tutup</button>
              <button type="submit" class="btn btn-primary ml-1">Mulai</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{-- Berhasil --}}
    <div class="modal fade text-left" id="berhasil-{{ $item->id }}-{{ $pengujian->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Selesai Pengujian</h5>
            <button type="button" class="close rounded-pill" data-bs-toggle="modal" data-bs-target="#pengujian-{{ $item->id }}" aria-label="Close">
              <i data-feather="x"></i>
            </button>
          </div>
          <form action="{{ route('update-pengujiaan', $pengujian->id) }}" method="post">
            @method('PUT')
            @csrf
            <input type="hidden" name="status" value="2">
            <div class="modal-body">

              <p class="text-muted fw-bold">{{ $pengujian->tahap->tahapan }}</p>
              
              <div class="mb-2">
                <label for="selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control @error('selesai') is-invalid @enderror" value="{{ old('selesai') }}" id="selesai" name="selesai" required>
                @error('selesai')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#pengujian-{{ $item->id }}">Tutup</button>
              <button type="submit" class="btn btn-success ml-1">Selesai</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    {{-- Gagal --}}
    <div class="modal fade text-left" id="gagal-{{ $item->id }}-{{ $pengujian->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Selesai Pengujian</h5>
            <button type="button" class="close rounded-pill" data-bs-toggle="modal" data-bs-target="#pengujian-{{ $item->id }}" aria-label="Close">
              <i data-feather="x"></i>
            </button>
          </div>
          <form action="{{ route('update-pengujiaan', $pengujian->id) }}" method="post">
            @method('PUT')
            @csrf
            <input type="hidden" name="status" value="3">
            <div class="modal-body">

              <p class="text-muted fw-bold">{{ $pengujian->tahap->tahapan }}</p>
              
              <div class="mb-2">
                <label for="selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control @error('selesai') is-invalid @enderror" value="{{ old('selesai') }}" id="selesai" name="selesai" required>
                @error('selesai')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#pengujian-{{ $item->id }}">Tutup</button>
              <button type="submit" class="btn btn-danger ml-1">Selesai</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    {{-- Edit --}}
    <div class="modal fade text-left" id="edit-{{ $item->id }}-{{ $pengujian->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Ubah Tanggal Pengujian</h5>
            <button type="button" class="close rounded-pill" data-bs-toggle="modal" data-bs-target="#pengujian-{{ $item->id }}" aria-label="Close">
              <i data-feather="x"></i>
            </button>
          </div>
          <form action="{{ route('update-pengujiaan', $pengujian->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="modal-body">

              <p class="text-muted fw-bold">{{ $pengujian->tahap->tahapan }}</p>
              
              <div class="mb-2">
                <label for="mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control @error('mulai') is-invalid @enderror" value="{{ old('mulai') ?? $pengujian->mulai }}" id="mulai" name="mulai" required>
                @error('mulai')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="mb-2">
                <label for="selesai" class="form-label">Tanggal Selesai</label>
                <input type="date" class="form-control @error('selesai') is-invalid @enderror" value="{{ old('selesai') ?? $pengujian->selesai }}" id="selesai" name="selesai" required>
                @error('selesai')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#pengujian-{{ $item->id }}">Tutup</button>
              <button type="submit" class="btn btn-primary ml-1">Mulai</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endforeach
@endforeach