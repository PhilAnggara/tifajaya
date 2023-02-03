<div class="modal fade text-left" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Tambah Data</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <form action="{{ route('perusahaan.store') }}" method="post">
        @csrf
        <div class="modal-body row">
          
          <div class="col-md-6 mb-2">
            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" value="{{ old('nama_perusahaan') }}" id="nama_perusahaan" name="nama_perusahaan" autocomplete="off" required>
            @error('nama_perusahaan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="nama_pj" class="form-label">Nama Penanggung Jawab</label>
            <input type="text" class="form-control @error('nama_pj') is-invalid @enderror" value="{{ old('nama_pj') }}" id="nama_pj" name="nama_pj" autocomplete="off" required>
            @error('nama_pj')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="jabatan_pj" class="form-label">Jabatan Penanggung Jawab</label>
            <input type="text" class="form-control @error('jabatan_pj') is-invalid @enderror" value="{{ old('jabatan_pj') }}" id="jabatan_pj" name="jabatan_pj" autocomplete="off" required>
            @error('jabatan_pj')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" id="alamat" name="alamat" autocomplete="off" required>
            @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="satuan_kerja" class="form-label">Satuan Kerja</label>
            <input type="text" class="form-control @error('satuan_kerja') is-invalid @enderror" value="{{ old('satuan_kerja') }}" id="satuan_kerja" name="satuan_kerja" autocomplete="off" required>
            @error('satuan_kerja')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="nama_pjsatu" class="form-label">Nama Penanggung Jawab (Pihak Pertama)</label>
            <input type="text" class="form-control @error('nama_pjsatu') is-invalid @enderror" value="{{ old('nama_pjsatu') }}" id="nama_pjsatu" name="nama_pjsatu" autocomplete="off" required>
            @error('nama_pjsatu')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="jabatan_pjsatu" class="form-label">Jabatan Penanggung Jawab (Pihak Pertama)</label>
            <input type="text" class="form-control @error('jabatan_pjsatu') is-invalid @enderror" value="{{ old('jabatan_pjsatu') }}" id="jabatan_pjsatu" name="jabatan_pjsatu" autocomplete="off" required>
            @error('jabatan_pjsatu')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="paket" class="form-label">Paket</label>
            <input type="text" class="form-control @error('paket') is-invalid @enderror" value="{{ old('paket') }}" id="paket" name="paket" autocomplete="off" required>
            @error('paket')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="no_sp" class="form-label">No. Surat Permohonan Pengujian</label>
            <input type="text" class="form-control @error('no_sp') is-invalid @enderror" value="{{ old('no_sp') }}" id="no_sp" name="no_sp" autocomplete="off" required>
            @error('no_sp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="tgl_sp" class="form-label">Tanggal Surat Permohonan Pengujian</label>
            <input type="date" class="form-control @error('tgl_sp') is-invalid @enderror" value="{{ old('tgl_sp') }}" id="tgl_sp" name="tgl_sp" autocomplete="off" required>
            @error('tgl_sp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="no_kontrak" class="form-label">No. Kontrak</label>
            <input type="text" class="form-control @error('no_kontrak') is-invalid @enderror" value="{{ old('no_kontrak') }}" id="no_kontrak" name="no_kontrak" autocomplete="off" required>
            @error('no_kontrak')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="telp" class="form-label">No. Telepon</label>
            <input type="number" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp') }}" id="telp" name="telp" autocomplete="off" required>
            @error('telp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="tgl_daftar" class="form-label">Tanggal Terdaftar</label>
            <input type="date" class="form-control @error('tgl_daftar') is-invalid @enderror" value="{{ old('tgl_daftar') }}" id="tgl_daftar" name="tgl_daftar" autocomplete="off" required>
            @error('tgl_daftar')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          
          <div class="col-md-6 mb-2">
            <label for="id_jenis_pengujian" class="form-label">Jenis Pengujian</label>
            <select class="form-select" id="id_jenis_pengujian" name="id_jenis_pengujian" required>
              <option value="" selected disabled>-- Pilih Jenis Pengujian --</option>
              @foreach ($jenis_pengujian as $j_pengujian)
                <option value="{{ $j_pengujian->id }}" {{ old('id_jenis_pengujian') == $j_pengujian->id ? 'selected' : '' }}>{{ $j_pengujian->jenis }}</option>
              @endforeach
            </select>
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
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel1">{{ $item->nama_perusahaan }} <small class="text-muted">( {{ $item->token }} )</small></h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <div class="modal-body">

          <p class="text-muted fw-bold text-center">Data Perusahaan</p>
            
          <div class="table-responsive">
            <table class='table table-hover border table-striped table-sm'>
              <tbody>
                <tr>
                  <th>Nama Perusahaan</th>
                  <td>{{ $item->nama_perusahaan }}</td>
                </tr>
                <tr>
                  <th>Nama Penanggung Jawab</th>
                  <td>{{ $item->nama_pj }}</td>
                </tr>
                <tr>
                  <th>Jabatan Penanggung Jawab</th>
                  <td>{{ $item->jabatan_pj }}</td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td class="fst-italic text-decoration-underline">
                    <i class="fal fa-location-dot text-danger"></i>
                    {{ $item->alamat }}
                  </td>
                </tr>
                <tr>
                  <th>Satuan Kerja</th>
                  <td>{{ $item->satuan_kerja }}</td>
                </tr>
                <tr>
                  <th>Nama Penanggung Jawab (Pihak Pertama)</th>
                  <td>{{ $item->nama_pjsatu }}</td>
                </tr>
                <tr>
                  <th>Jabatan Penanggung Jawab (Pihak Pertama)</th>
                  <td>{{ $item->jabatan_pjsatu }}</td>
                </tr>
                <tr>
                  <th>Paket</th>
                  <td>{{ $item->paket }}</td>
                </tr>
                <tr>
                  <th>No. Telepon</th>
                  <td>
                    <span class="badge bg-light rounded" onclick="copyToClipboard('{{ $item->telp }}')">
                      <i class="fal fa-phone"></i>
                      {{ $item->telp }}
                    </span>
                  </td>
                </tr>
                <tr>
                  <th>No. Kontrak</th>
                  <td>
                    <span class="badge bg-light rounded" onclick="copyToClipboard('{{ $item->no_kontrak }}')">
                      <i class="fal fa-file-lines"></i>
                      {{ $item->no_kontrak }}
                    </span>
                  </td>
                </tr>
                <tr>
                  <th>No. Surat Permohonan Pengujian</th>
                  <td>
                    <span class="badge bg-light rounded" onclick="copyToClipboard('{{ $item->no_sp }}')">
                      <i class="fal fa-file-lines"></i>
                      {{ $item->no_sp }}
                    </span>
                  </td>
                </tr>
                <tr>
                  <th>Tanggal Surat Permohonan Pengujian</th>
                  <td>
                    <i class="fal fa-calendar-day text-warning"></i>
                    {{ $carbon::parse($item->tgl_sp)->isoFormat('D MMMM YYYY') }}
                  </td>
                </tr>
                <tr>
                  <th>Tanggal Terdaftar</th>
                  <td>
                    <i class="fal fa-calendar-day text-danger"></i>
                    {{ $carbon::parse($item->tgl_daftar)->isoFormat('D MMMM YYYY') }}
                  </td>
                </tr>
                <tr>
                  <th>Jenis Pengujian</th>
                  <td>
                    <span class="badge bg-secondary">{{ $item->jenisPengujian()->jenis }}</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <p class="text-muted fw-bold text-center">Progress</p>

          <div class="progress progress-primary mb-4">
            <div class="progress-bar progress-label" role="progressbar" style="width: {{ $item->persentase() }}%"  aria-valuenow="{{ $item->persentase() }}" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="table-responsive">
            <table class='table table-hover border text-center table-striped text-nowrap'>
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
                          Gagal
                        </span>
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
  
  <div class="modal fade text-left" id="edit-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel1">Edit Data</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <form action="{{ route('perusahaan.update', $item->id) }}" method="post">
          @method('PUT')
          @csrf
          <div class="modal-body row">
          
            <div class="col-md-6 mb-2">
              <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
              <input type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" value="{{ old('nama_perusahaan') ?? $item->nama_perusahaan }}" id="nama_perusahaan" name="nama_perusahaan" autocomplete="off" required>
              @error('nama_perusahaan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="nama_pj" class="form-label">Nama Penanggung Jawab</label>
              <input type="text" class="form-control @error('nama_pj') is-invalid @enderror" value="{{ old('nama_pj') ?? $item->nama_pj }}" id="nama_pj" name="nama_pj" autocomplete="off" required>
              @error('nama_pj')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="jabatan_pj" class="form-label">Jabatan Penanggung Jawab</label>
              <input type="text" class="form-control @error('jabatan_pj') is-invalid @enderror" value="{{ old('jabatan_pj') ?? $item->jabatan_pj }}" id="jabatan_pj" name="jabatan_pj" autocomplete="off" required>
              @error('jabatan_pj')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') ?? $item->alamat }}" id="alamat" name="alamat" autocomplete="off" required>
              @error('alamat')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="satuan_kerja" class="form-label">Satuan Kerja</label>
              <input type="text" class="form-control @error('satuan_kerja') is-invalid @enderror" value="{{ old('satuan_kerja') ?? $item->satuan_kerja }}" id="satuan_kerja" name="satuan_kerja" autocomplete="off" required>
              @error('satuan_kerja')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="nama_pjsatu" class="form-label">Nama Penanggung Jawab (Pihak Pertama)</label>
              <input type="text" class="form-control @error('nama_pjsatu') is-invalid @enderror" value="{{ old('nama_pjsatu') ?? $item->nama_pjsatu }}" id="nama_pjsatu" name="nama_pjsatu" autocomplete="off" required>
              @error('nama_pjsatu')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="jabatan_pjsatu" class="form-label">Jabatan Penanggung Jawab (Pihak Pertama)</label>
              <input type="text" class="form-control @error('jabatan_pjsatu') is-invalid @enderror" value="{{ old('jabatan_pjsatu') ?? $item->jabatan_pjsatu }}" id="jabatan_pjsatu" name="jabatan_pjsatu" autocomplete="off" required>
              @error('jabatan_pjsatu')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="paket" class="form-label">Paket</label>
              <input type="text" class="form-control @error('paket') is-invalid @enderror" value="{{ old('paket') ?? $item->paket }}" id="paket" name="paket" autocomplete="off" required>
              @error('paket')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="no_sp" class="form-label">No. Surat Permohonan Pengujian</label>
              <input type="text" class="form-control @error('no_sp') is-invalid @enderror" value="{{ old('no_sp') ?? $item->no_sp }}" id="no_sp" name="no_sp" autocomplete="off" required>
              @error('no_sp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="tgl_sp" class="form-label">Tanggal Surat Permohonan Pengujian</label>
              <input type="date" class="form-control @error('tgl_sp') is-invalid @enderror" value="{{ old('tgl_sp') ?? $item->tgl_sp }}" id="tgl_sp" name="tgl_sp" autocomplete="off" required>
              @error('tgl_sp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="no_kontrak" class="form-label">No. Kontrak</label>
              <input type="text" class="form-control @error('no_kontrak') is-invalid @enderror" value="{{ old('no_kontrak') ?? $item->no_kontrak }}" id="no_kontrak" name="no_kontrak" autocomplete="off" required>
              @error('no_kontrak')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="telp" class="form-label">No. Telepon</label>
              <input type="number" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp') ?? $item->telp }}" id="telp" name="telp" autocomplete="off" required>
              @error('telp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="tgl_daftar" class="form-label">Tanggal Terdaftar</label>
              <input type="date" class="form-control @error('tgl_daftar') is-invalid @enderror" value="{{ old('tgl_daftar') ?? $item->tgl_daftar }}" id="tgl_daftar" name="tgl_daftar" autocomplete="off" required>
              @error('tgl_daftar')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            
            <div class="col-md-6 mb-2">
              <label for="id_jenis_pengujian" class="form-label">Jenis Pengujian</label>
              <select class="form-select" id="id_jenis_pengujian" name="id_jenis_pengujian" required disabled>
                <option value="" selected disabled>-- Pilih Jenis Pengujian --</option>
                @foreach ($jenis_pengujian as $j_pengujian)
                  <option value="{{ $j_pengujian->id }}" {{ $item->jenisPengujian()->id == $j_pengujian->id ? 'selected' : '' }}>{{ $j_pengujian->jenis }}</option>
                @endforeach
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
@endforeach