<div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Tambah Pengguna</h5>
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
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" id="username" name="username" autocomplete="off" required>
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" autocomplete="off" required>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="mb-2">
            <label for="telp" class="form-label">Nomor Telepon</label>
            <input type="number" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp') }}" id="telp" name="telp" autocomplete="off" required>
            @error('telp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-2">
            <label for="role" class="form-label">Tipe Pengguna</label>
            <select class="form-select" id="role" name="role" required>
              <option value="" selected disabled>-- Pilih Tipe Pengguna --</option>
              <option {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
              <option {{ old('role') == 'Kepala Seksi' ? 'selected' : '' }}>Kepala Seksi</option>
              <option {{ old('role') == 'Kepala Lab' ? 'selected' : '' }}>Kepala Lab</option>
            </select>
          </div>
          
          <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off" required>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="mb-2">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" autocomplete="off" required>
            @error('password_confirmation')
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
  <div class="modal fade text-left" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel1">Edit Pengguna</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <form action="{{ route('kelola-pengguna.update', $item->id) }}" method="post">
          @method('PUT')
          @csrf
          <input type="hidden" name="update" value="1">
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
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') ?? $item->username }}" id="username" name="username" autocomplete="off" required>
              @error('username')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="mb-2">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $item->email }}" id="email" name="email" autocomplete="off" required>
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="mb-2">
              <label for="telp" class="form-label">Nomor Telepon</label>
              <input type="number" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp') ?? $item->telp }}" id="telp" name="telp" autocomplete="off" required>
              @error('telp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
  
            <div class="mb-2">
              <label for="role" class="form-label">Tipe Pengguna</label>
              <select class="form-select" id="role" name="role" required>
                <option value="" selected disabled>-- Pilih Tipe Pengguna --</option>
                <option {{ $item->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option {{ $item->role == 'Kepala Seksi' ? 'selected' : '' }}>Kepala Seksi</option>
                <option {{ $item->role == 'Kepala Lab' ? 'selected' : '' }}>Kepala Lab</option>
              </select>
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

  <div class="modal fade text-left" id="reset-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel1">Reset Password</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <form action="{{ route('kelola-pengguna.update', $item->id) }}" method="post">
          @method('PUT')
          @csrf
          <div class="modal-body">
            
            <div class="mb-2">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off" required>
              @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="mb-2">
              <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" autocomplete="off" required>
              @error('password_confirmation')
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