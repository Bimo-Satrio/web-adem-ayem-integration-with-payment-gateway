@section('title')
Pembayaran
@endsection

<div>
    @extends('layouts.apps')
    @section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Rincian Penyewa</h5>
                    <p class="text-center">Email {{ Auth::user()->email }} </p>
                    <p class="text-center">Nama Lengkap {{ Auth::user()->name }} </p>
                    <p class="text-center">Nomor Telefon {{Auth::user()->no_telefon}} </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Rincian Sewa Unit Kontrakan</h5>
                    <p class="text-center">Unit Kontrakan {{$pengajuan_sewa ->unit_kontrakan}} Rp. {{number_format($pengajuan_sewa->harga_unit_kontrakan)  }} </p>
                    <p class="text-center">Lama Huni {{ $pengajuan_sewa->lama_huni_unit_kontrakan }}</p>
                    <p class="text-center"> Silahkan Melakukan Pembayaran Sebesar Rp. {{ number_format ($pengajuan_sewa -> harga_unit_kontrakan * intval ($pengajuan_sewa->lama_huni_unit_kontrakan))  }}</p>
                    <div class="text-center">
                        <button id="pay-button" name="pay-button" type='button' class='btn btn-primary'>Bayar</button>
                    </div>

                </div>
            </div>
        </div>

        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="env('MIDTRANS_CLIENT_KEY', null)"></script>
        <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
        <script type="text/javascript">
            // For example trigger on button clicked, or any time you need
            var payButton = document.getElementById('pay-button');
            payButton.addEventListener('click', function() {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                window.snap.pay('{{$snapToken}}', {
                    onSuccess: function(result) {
                        Swal.fire(
                            'Sukses',
                            'Pembayaran Berhasil',
                            'success'
                        ).then(function() {
                            window.location.href = '/payments-success/{{$pengajuan_sewa->id_pengajuan_sewa}}'
                        })
                        console.log(result);
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */

                        Swal.fire(
                            'Menunggu',
                            'Silahkan Lakukan Pembayaran Anda',
                            'info'
                        )


                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        Swal.fire(
                            'Gagal',
                            'Pembayaran Anda Gagal',
                            'error'
                        )

                    },
                    onClose: function() {
                        /* You may add your own implementation here */

                        Swal.fire(
                            'Gagal',
                            'Anda Menutup Popup Tanpa Menyelesaikan Pembayaran',
                            'info'
                        )

                    }
                })
            });
        </script>


    </div>


    @endsection
</div>
