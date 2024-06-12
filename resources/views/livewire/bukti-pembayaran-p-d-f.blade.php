<div >



    <style>
        table {
          border-collapse: collapse;
          width: 100%;
          max-width: 100%;
          margin-bottom: 1rem;
          background-color: transparent;
          border: 1px solid black;
          font-size: 0.8rem; /* Ukuran font dapat disesuaikan sesuai kebutuhan */
        }
        th, td {
          text-align: left;
          padding: 0.75rem;
          vertical-align: middle;
          border: 1px solid black;
        }
        th {
          background-color: #f2f2f2;
          font-weight: bold;
        }
      </style>

                <h3>Bukti Pembayaran : {{ $pengajuan_sewa->id_pengajuan_sewa }} </h3>
                <hr>
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
                            <th>Status Pembayaran</th>
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

<hr>

            Catatan
            <br>
            Mohon Sertakan Bukti Pembayaran dan Nota Pada Saat ke Lokasi


</div>
