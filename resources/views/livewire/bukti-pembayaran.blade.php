<div class="container-fluid">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('riwayat_pengajuan')}}">Kembali ke Riwayat Transaksi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bukti Pembayaran</li>
                    </ol>
                </nav>
                <h3>Bukti Pembayaran : {{ $pengajuan_sewa->id_pengajuan_sewa }} </h3>
                <hr>
                <div class="row">
                    <div class="col-10 col-md-10">

                    </div>

                    <div class="col-2 col-md-2 my-4">
                        <a href="{{ route('bukti-pembayaran-p-d-f',$pengajuan_sewa->id_pengajuan_sewa ) }}">

                            <button class="btn btn-primary">Download Bukti Pembayaran</button>

                        </a>
                    </div>

                </div>
                <div class="table table-responsive">
                <table class="table table-hover  table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Nama Penyewa</th>
                            <th>Nomor Telefon</th>
                            <th>Email</th>
                            <th>Bank</th>
                            <th>Virtual Account</th>
                            <th>Total Harga</th>
                            <th>Status Pembayaran Tagihan</th>
                            <th>Waktu Pembayaran</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $pengajuan_sewa->nama_lengkap_user}}</td>
                            <td>{{ $pengajuan_sewa->no_telefon_user }}</td>
                            <td>{{ $pengajuan_sewa->email_user }}</td>
                            <td>@if ($payment_type)
                                Bank Transfer
                              @endif

                              {{ $bank }} </td>
                            <td>{{ $va_number }}</td>

                            <td>Rp. {{number_format($gross_amount) }} Lama Huni {{$pengajuan_sewa->lama_huni_unit_kontrakan }}</td>
                            <td>
                                @if ($transaction_status)
                                    <span class="badge bg-success">Pembayaran Berhasil</span>


                                @endif



                            <td>{{date('d F Y H:i:s',strtotime($transaction_time))}}</td>



                        </tr>

                    </tbody>

            </table>


        </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
    Catatan
    <br>
    Mohon Sertakan Bukti Pembayaran dan Nota Pada Saat ke Lokasi

        </div>
    </div>

</div>
