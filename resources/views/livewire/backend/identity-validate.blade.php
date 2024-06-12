@section('title')
Konfirmasi Identitas
@endsection

<div >
    <div class="container">
        @include('livewire.backend.showModalVal')
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Konfirmasi Identitas</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 mb-1">
                                    <div class="input-group mb-3">
                                        <input wire:model.debounce.300ms="search"  class="form-control" placeholder="Ketik Pencarian Berdasarkan ID Transaksi Atau Unit" />
                                    </div>

                                </div>
                                <div class="col-md-4 mb-1">
                                    <select class="form-select" wire:model.debounce.300ms="filter">
                                        <option value="0">Status Transaksi</option>
                                        <option value="1">Menunggu Diproses Admin</option>
                                        <option value="2">Menunggu Pembayaran </option>
                                        <option value="3">Pembayaran Berhasil</option>

                                      </select>
                                </div>
                            </div>

                            <!-- table hover -->
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>ID Transaksi</th>
                                            <th>Nama Lengkap</th>
                                            <th>Unit </th>
                                            <th>Total Harga</th>
                                            <th>Tanggal </th>
                                            <th>Status Transaksi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pengajuan_sewa as $trans)
                                        <tr>
                                            <td>{{ $pengajuan_sewa->firstItem() + $loop->index }}</td>

                                            <td>{{ $trans->id_pengajuan_sewa }}</td>
                                            <td>{{ $trans->nama_lengkap }}</td>
                                            <td>{{$trans -> unit_kontrakan }}</td>




                                            <td>Rp. {{number_format($trans -> harga_unit_kontrakan *  intval ($trans -> lama_huni_unit_kontrakan))   }} Lama Huni {{$trans->lama_huni_unit_kontrakan}}</td>
                                            <td>{{{date('d F Y ',strtotime($trans  -> tanggal_huni))}}}</td>
                                            <td>{{{date('d F Y H:i:s',strtotime($trans  -> created_at))}}}</td>

                                            <td>

                                                @if($trans->status_identitas == 1)
                                                <span class="badge bg-info">Belum Upload Identitas</span>
                                                @elseif($trans->status_pengajuan_sewa == 1 )
                                                <span class="badge bg-info">Menunggu Diproses Admin</span>


                                                @elseif($trans->status_pengajuan_sewa == 2)
                                                <span class="badge bg-info">Menunggu Pembayaran Penyewa</span>


                                                @elseif($trans->status_pengajuan_sewa == 3)
                                                <span class="badge bg-info">Pembayaran Pending</span>

                                                @elseif($trans->status_pengajuan_sewa == 4)
                                                <span class="badge bg-danger">Pembayaran Ditolak Oleh Sistem</span>

                                                @elseif($trans->status_pengajuan_sewa == 5)
                                                <span class="badge bg-primary">Sudah Dilakukan Pembayaran</span>

                                                @elseif($trans->status_pengajuan_sewa == 6)
                                                <span class="badge bg-danger">Pembayaran Hangus</span>

                                                @elseif($trans->status_pengajuan_sewa == 7)
                                                <span class="badge bg-danger">Pembayaran Dicancel</span>
                                                @endif
                                            </td>



                                            <td>
                                                @if($trans->status_identitas == 1)
                                                <span class="badge bg-info">Belum Upload Identitas</span>
                                                @elseif($trans->status_pengajuan_sewa == 1 )
                                                <span class="badge bg-info">Menunggu Diproses Admin</span>


                                                @elseif($trans->status_pengajuan_sewa == 2)
                                                <span class="badge bg-info">Menunggu Pembayaran Penyewa</span>


                                                @elseif($trans->status_pengajuan_sewa == 3)
                                                <span class="badge bg-info">Pembayaran Pending</span>

                                                @elseif($trans->status_pengajuan_sewa == 4)
                                                <span class="badge bg-danger">Pembayaran Ditolak Oleh Sistem</span>

                                                @elseif($trans->status_pengajuan_sewa == 5)
                                                <span class="badge bg-primary">Sudah Dilakukan Pembayaran</span>

                                                @elseif($trans->status_pengajuan_sewa == 6)
                                                <span class="badge bg-danger">Pembayaran Hangus</span>

                                                @elseif($trans->status_pengajuan_sewa == 7)
                                                <span class="badge bg-danger">Pembayaran Dicancel</span>
                                                @endif
                                            </td>

                                            @empty


                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-4">
                                {{ $pengajuan_sewa->links() }}
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>
