<div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Tambah Data</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <form action="{{ route('kelola-pengguna.store') }}" method="post">
        @csrf
        <div class="modal-body">
          
          <div class="mb-2">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" autocomplete="off" required>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="mb-2">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" autocomplete="off" required>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="mb-2">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" autocomplete="off" required>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="mb-2">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name" autocomplete="off" required>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary ml-1">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach ($items as $item)
  <div class="modal fade text-left" id="detail-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel1">Detail</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <div class="modal-body">
            
          ...

        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade text-left" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel1">Edit Data</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <form action="{{ route('kelola-pengguna.update', $item->id) }}" method="post">
          @method('PUT')
          @csrf
          <div class="modal-body">
            
            <div class="mb-2">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $item->name }}" id="name" name="name" autocomplete="off" required>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="mb-2">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $item->name }}" id="name" name="name" autocomplete="off" required>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="mb-2">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $item->name }}" id="name" name="name" autocomplete="off" required>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="mb-2">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ?? $item->name }}" id="name" name="name" autocomplete="off" required>
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary ml-1">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endforeach