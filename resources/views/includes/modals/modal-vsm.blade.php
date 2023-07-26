<div class="modal fade text-left" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Upload Dokumen</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <form action="{{ route('upload-dokumen') }}" method="post" enctype="multipart/form-data" id="uploadForm">
        @csrf
        <input type="hidden" name="file_count" id="fileCount">
        <div class="modal-body">
            
          <div class="mt-2">
            <input type="file" class="form-control form-control-lg @error('documents') is-invalid @enderror" id="documents" name="documents[]" accept="application/pdf" required multiple>
            <p class="mb-0 text-end"><small class="text-muted">Max 20 file</small></p>
            @error('documents')
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