<div>



<h5>Nota : {{ $pengajuan_sewa->id_pengajuan_sewa }}</h5>


<h5> Tanggal Pengajuan Sewa  {{ date('d F Y ',strtotime($pengajuan_sewa->created_at) ) }}</h5>





<h5>Dapat mulai Huni Pada {{ date('d F Y ',strtotime( $tanggal_mulai )) }}</h5>






</div>

</div>
<hr>





      <!-- table bordered -->
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

      <table>
        <thead>
          <tr>
            <th>Unit Konrakan</th>
            <th>Lokasi</th>
            <th>Total Harga</th>
            <th>Tanggal Mulai Huni</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $pengajuan_sewa -> unit_kontrakan }}</td>
            <td>{{ $pengajuan_sewa -> lokasi_unit_kontrakan }}</td>
            <td>Rp. {{ number_format(($pengajuan_sewa -> harga_unit_kontrakan_total) * intval( $pengajuan_sewa->lama_huni_unit_kontrakan))  }} Lama Huni {{ $pengajuan_sewa->lama_huni_unit_kontrakan }}</td>
            <td>{{ date('d F Y ',strtotime( $tanggal_mulai )) }}</td>
          </tr>
        </tbody>
      </table>




<hr>

Catatan
<br>
Mohon Sertakan Bukti Pembayaran dan Nota Pada Saat ke Lokasi



</div>


