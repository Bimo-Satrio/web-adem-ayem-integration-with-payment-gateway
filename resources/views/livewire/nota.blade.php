<div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Kembali ke Riwayat Pengajuan Sewa</a></li>
              <li class="breadcrumb-item active" aria-current="page">Nota {{$pengajuan_sewa->id_pengajuan_sewa}}</li>
            </ol>
          </nav>


  <h5>Nota : {{ $pengajuan_sewa->id_pengajuan_sewa }}</h5>
<br>

<h5> Tanggal Pengajuan Sewa  {{ date('d F Y ',strtotime($pengajuan_sewa->created_at) ) }}</h5>



   <hr>

 <h5>Dapat mulai Huni Pada {{ date('d F Y ',strtotime( $tanggal_mulai )) }}</h5>



   <hr>
   <div class="row">

<div class="col-10 col-md-10">

</div>
<div class="col-2 col-md-2">


<a href="{{ route('nota-p-d-f',$pengajuan_sewa->id_pengajuan_sewa) }}">
<button class="btn btn-primary"`>Download Nota</button>
</a>



</div>
</div>
<hr>

<div class="row" id="table-bordered">
    <div class="col-12 col-md-12">
      <div class="card">

        <div class="card-content">
          <!-- table bordered -->
          <div class="table-responsive">
            <table class="table table-bordered mb-0">
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
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="card">
    <div class="card-body">
Catatan
<br>
Mohon Sertakan Bukti Pembayaran dan Nota Pada Saat ke Lokasi

    </div>
</div>

</div>

