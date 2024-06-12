@section('titlle')
Laporan Transaksi Penyewaan
@endsection

<div>
    <h5>Laporan Transaksi Penyewaan</h5>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="filter">
             <div class="my-4">
                <div class="my-4">
                    <label for="dari"><h5> Dari</h5></label>
                    <input type="date" class="form-control" wire:model="dari" id="dari">
                </div>
                <div class="my-4">
                    <label for="sampai"><h5> Sampai</h5></label>
                    <input type="date" class="form-control" wire:model="sampai" id="sampai">
                </div>
                <button class="btn btn-primary" type="submit">Tampilkan</button>
              </div>
            </form>
            @if ($pengajuan_sewa == NULL)
            <h5></h5>
            @else
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                              <tr>
                                <th>ID Transaksi</th>
                                <th>Nama Lengkap</th>
                                <th>Unit</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                                <th>Tanggal Menghuni</th>
                                <th>Status Transaksi</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>

                              <tr>
                                @foreach ( $pengajuan_sewa as $pengajuan)
                                <th > {{ $pengajuan->id_pengajuan_sewa }}</th>
                                <td >Larry the Bird</td>
                                <td >{{ $pengajuan->harga_unit_kontrakan_total * intval($pengajuan->lama_huni_unit_kontrakan) }}</td>
                               @php
                                   $total += $pengajuan->harga_unit_kontrakan_total * intval($pengajuan->lama_huni_unit_kontrakan);
                               @endphp
                                @endforeach
                            </tr>
                            </tbody>
                            <tfoot>
                                {{ $total }}
                            </tfoot>
                          </table>
                        </div>
                          @endif
        </div>
    </div>
</div>
