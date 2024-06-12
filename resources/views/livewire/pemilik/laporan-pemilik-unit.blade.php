<div>


          <!-- Bordered table start -->
          <section class="section">
            <div class="row" id="table-bordered">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Laporan Pemilik Unit Kontrakan</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">

                    <!-- table bordered -->
                    <div class="table-responsive">
                      <table class="table table-bordered mb-0 table-hover">
                        <thead>
                          <tr>
                            <th>Nomor</th>
                                        <th>Unit</th>
                                        <th>Foto Unit</th>
                                        <th>Deskripsi</th>
                                        <th>Lokasi</th>
                                        <th>Latitude</th>
                                        <th>Longtitude</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>

                          <tr>
                            @forelse ($unit_kontrakan as $unit )

                            <td>{{ $unit_kontrakan->firstItem() + $loop->index }}</td>
                            <td>{{ $unit->kontrakan }}</td>
                            <td>{{ $unit->harga }}</td>
                            <td>{{ $unit->lokasi }}</td>


                          </tr>
                          @empty
<h3>Kosong</h3>
                          @endforelse
                        </tbody>
                      </table>
                      <div class="mt-4">
    {{ $unit_kontrakan -> links() }}
</div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Bordered table end -->



</div>
