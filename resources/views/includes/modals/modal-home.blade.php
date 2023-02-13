<div class="modal fade" id="harga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar Harga Pengujian</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="material-tab" data-bs-toggle="tab" data-bs-target="#material" type="button" role="tab">Pengujian Material</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="lapangan-tab" data-bs-toggle="tab" data-bs-target="#lapangan" type="button" role="tab">Pengujian Lapangan</button>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="material" role="tabpanel">
            <div class="mt-4">
              <table class="table table-hover border table-striped">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Item Pengujian</th>
                    <th class="text-center" scope="col">Kebutuhan Material</th>
                    <th class="text-center" scope="col">Lama Pengujian</th>
                    <th class="text-center" scope="col">Biaya</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($harga[0]->item_pengujian as $material)
                    <tr>
                      <td class="fst-italic" scope="row">{{ $loop->iteration }}</td>
                      <th>{{ $material->item }}</th>
                      <td class="text-center">{{ $material->kebutuhan }} <small>Kg</small> <i class="fal fa-weight-scale"></i></td>
                      <td class="text-center">{{ $material->lama_pengujian }} <small>Hari</small> <i class="fal fa-calendar-day text-danger"></i></td>
                      <td class="text-nowrap"><span class="fst-italic">Rp</span> {{ number_format($material->harga, 0, ',', '.') }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="lapangan" role="tabpanel">
            <div class="mt-4">
              <table class="table table-hover border table-striped">
                <thead>
                  <tr>
                    <th class="text-center" scope="col">No</th>
                    <th class="text-center" scope="col">Item Pengujian</th>
                    <th class="text-center" scope="col">Satuan</th>
                    <th class="text-center" scope="col">Biaya</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($harga[1]->item_pengujian as $material)
                    <tr>
                      <td class="fst-italic" scope="row">{{ $loop->iteration }}</td>
                      <th>{{ $material->item }}</th>
                      <td class="text-center">
                        <span class="badge bg-light">
                          {{ $material->satuan }}
                        </span>
                      </td>
                      <td class="text-nowrap"><span class="fst-italic">Rp</span> {{ number_format($material->harga, 0, ',', '.') }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="sssssssssssssss" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar Harga Pengujian</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          @foreach ($jenis_pengujian as $jenis)
            <li class="nav-item" role="presentation">
              <button class="nav-link {{ $loop->iteration == 1 ? 'active' : '' }}" id="tab-{{ $jenis->id }}" data-bs-toggle="tab" data-bs-target="#target-{{ $jenis->id }}" type="button" role="tab">{{ $jenis->jenis }}</button>
            </li>
          @endforeach
        </ul>
        <div class="tab-content" id="myTabContent">
          @foreach ($jenis_pengujian as $jenis)
            <div class="tab-pane fade {{ $loop->iteration == 1 ? 'show active' : '' }}" id="target-{{ $jenis->id }}">
              <div class="mt-4">
                <table class="table table-hover border table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td colspan="2">Larry the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>
</div>