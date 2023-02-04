@foreach ($items as $item)
  <div class="modal fade text-left" id="upload-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel1">Unggah Surat</h5>
          <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
            <i data-feather="x"></i>
          </button>
        </div>
        <form action="{{ route('upload', $item->id) }}" method="post" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <input type="hidden" name="type" value="Surat Perintah Pengujian">
          <div class="modal-body">
            
            <div class="mb-2">
              <input type="file" class="form-control @error('document') is-invalid @enderror" id="document" name="document" required>
              @error('document')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary ml-1">Unggah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endforeach