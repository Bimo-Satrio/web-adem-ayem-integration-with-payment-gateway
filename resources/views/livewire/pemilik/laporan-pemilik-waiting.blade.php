<div>



          <!-- Bordered table start -->
          <section class="section">
            <div class="row" id="table-bordered">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Laporan Waiting List</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">



                    <!-- table bordered -->
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover mb-0">
                        <thead>
                          <tr>
                            <th>Nomor</th>
                            <th>ID Penghuni</th>
                            <th>Nama Penghuni</th>
                            <th>Nomor Telefon</th>
                            <th>Unit</th>
                            <th>Lama Menghuni</th>
                            <th>Tanggal Menghuni</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($laporan_waiting_list as  $waiting)
                          <tr>
                            <td>{{ $waiting->user->nama_lengkap }}</td>
                            <td>{{ $waiting->user->email }}</td>
                            <td>{{ $waiting->user->no_telefon }}</td>
                            <td>{{ $waiting->kontrakan->unit_konrakan }}</td>
                            <td>{{ $waiting->tanggal_pengajuan }}</td>
                            <td>
                                @if ($waiting->kontrakan->status_ketersediaan < 1 and $waiting->kontrakan->status_huni < 1 )
                                <span class="badge bg-warning">Menunggu Ketersediaan</span>
                            @elseif ($waiting->kontrakan->status_ketersediaan > 1 and $waiting->kontrakan->$status_huni > 1 )
                                <span class="badge bg-primary">Sudah Tersedia</span>





                            @elseif ($waiting->status_waiting_list == 1)
                            <span class="badge bg-primary">Selesai</span>
                            @endif</td>


                            @empty
                          </tr>
                          <h3>Kosong</h3>
                        </tbody>
                        @endforelse
                      </table>
                      <div class="mt-4">
                      {{ $laporan_waiting_list -> links() }}
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
