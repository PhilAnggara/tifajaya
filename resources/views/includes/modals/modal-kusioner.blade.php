<div class="modal fade" id="kusioner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kusioner Kepuasan</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent="kirim">
            
          <div class="mb-2">
            <label for="nama_responden" class="form-label">Nama Responden</label>
            <input type="text" class="form-control form-control-sm @error('nama_responden') is-invalid @enderror" id="nama_responden" wire:model.defer="state.nama_responden" autocomplete="off" required>
            @error('nama_responden')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="mb-2">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control form-control-sm @error('jabatan') is-invalid @enderror" id="jabatan" wire:model.defer="state.jabatan" autocomplete="off" required>
            @error('jabatan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>

          @foreach ($questions as $question)
            <div class="border rounded-3 p-3 mt-3">
              <p class="text-dark">{{ $loop->iteration }}. {{ $question->text }}</p>
              <input type="hidden" name="pertanyaan[{{ $question->id }}]" wire:model.defer="state.jawaban.{{ $question->id }}" value="">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pertanyaan[{{ $question->id }}]" wire:model.defer="state.jawaban.{{ $question->id }}" id="pilihan-{{ $question->id }}-1" value="a" required>
                <label class="form-check-label text-muted" for="pilihan-{{ $question->id }}-1">{{ $question->a }}</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pertanyaan[{{ $question->id }}]" wire:model.defer="state.jawaban.{{ $question->id }}" id="pilihan-{{ $question->id }}-2" value="b" required>
                <label class="form-check-label text-muted" for="pilihan-{{ $question->id }}-2">{{ $question->b }}</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pertanyaan[{{ $question->id }}]" wire:model.defer="state.jawaban.{{ $question->id }}" id="pilihan-{{ $question->id }}-3" value="c" required>
                <label class="form-check-label text-muted" for="pilihan-{{ $question->id }}-3">{{ $question->c }}</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="pertanyaan[{{ $question->id }}]" wire:model.defer="state.jawaban.{{ $question->id }}" id="pilihan-{{ $question->id }}-4" value="d" required>
                <label class="form-check-label text-muted" for="pilihan-{{ $question->id }}-4">{{ $question->d }}</label>
              </div>
            </div>
          @endforeach

          <div class="mt-3">
            <label for="saran_perbaikan" class="form-label">Saran Perbaikan</label>
            <textarea class="form-control @error('saran_perbaikan') is-invalid @enderror" id="saran_perbaikan" wire:model.defer="state.saran_perbaikan" rows="3" required></textarea>
            @error('saran_perbaikan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
    
          <div class="d-flex justify-content-end mt-3">
            <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary ms-2">Kirim</button>
          </div>
          
        </form>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary ml-1">Kirim</button>
      </div> --}}
    </div>
  </div>
</div>