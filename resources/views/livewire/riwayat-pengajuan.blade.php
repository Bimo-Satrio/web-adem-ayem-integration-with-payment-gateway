<div >

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ Route('home') }}">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Riwayat Transaksi Penyewaan</li>
        </ol>
      </nav>



    <div class="card">

        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-borderless ">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>ID Transaksi</th>
                        <th>Nama Lengkap</th>
                        <th>Unit</th>
                        <th>Total Harga</th>
                        <th>Tanggal</th>
                        <th>Tanggal Mulai Huni</th>
                        <th>Status Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengajuan as $riwayat)
                    <tr>
                        <td>{{ $pengajuan->firstItem() + $loop->index }}</td>
                        <td> {{ $riwayat->id_pengajuan_sewa }}</td>
                        <td>{{ $riwayat->nama_lengkap_user }}</td>
                        <td>{{$riwayat -> unit_kontrakan }}</td>
                        <td>Rp. {{number_format(($riwayat -> harga_unit_kontrakan_total ) * intval($riwayat->lama_huni_unit_kontrakan))    }} Lama Huni {{$riwayat->lama_huni_unit_kontrakan}}</td>
                        <td>{{{date('d F Y H:i:s',strtotime($riwayat  -> created_at))}}}</td>
                        <td>{{{date('d F Y H:i:s',strtotime($riwayat  -> tanggal_huni))}}}</td>


                        <td>

                            @if($riwayat->status_identitas == 1)
                            <span class="badge bg-info">Menunggu Upload Identitas</span>
                            @elseif($riwayat->status_pengajuan_sewa == 1 )
                            <span class="badge bg-info">Menunggu Konfirmassi Admin</span>


                            @elseif($riwayat->status_pengajuan_sewa == 2)
                            <span class="badge bg-primary">Menunggu Pembayaran </span>
                            @elseif($riwayat->status_pengajuan_sewa == 3)
                            <span class="badge bg-success">Pembayaran Berhasil </span>


                            @endif
                        </td>

                        <td>
                            @if($riwayat->status_identitas == 1)

                            <a href="{{ route('upload-identitas',['id_pengajuan_sewa'=>$riwayat->id_pengajuan_sewa]) }}">
                                <button class="btn btn-info" >Upload Identitas</button>
                            </a>

                            @elseif($riwayat->status_pengajuan_sewa == 1 )
                            <span class="badge bg-info">Menunggu Konfirmassi Admin</span>
                            @elseif($riwayat->status_pengajuan_sewa == 2)
                                <a href="       {{ route('payments',['id_pengajuan_sewa' => $riwayat->id_pengajuan_sewa]) }}
                                "><button class="btn btn-primary btn-sm">Bayar</button></a>

                            @elseif($riwayat->status_pengajuan_sewa == 3)






                            <a href="{{ route('bukti-pembayaran',$riwayat->id_pengajuan_sewa ) }}">
                                <span class="badge bg-success">Bukti Pembayaran</span>

                            </a>



                            @endif
                        </td>

                        @empty


                    </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
            <div class="mt-4">

            </div>
        </div>
    </div>
</div>
