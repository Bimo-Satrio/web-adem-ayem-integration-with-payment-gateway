@section('title')
Pembayaran
@endsection

<div>
    @extends('layouts.apps')
    @section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Rincian Tagihan</h5>
                    <p class="text-center">Unit Kontrakan {{$tagihan->penghuni->transaksi->unit_kontrakan}}</p>
                    <p class="text-center">Tagihan Lama Huni {{ $tagihan->penghuni->tagihan_lama_huni }}</p>
                    <p class="text-center"><b> Silahkan Melakukan Pembayaran Sebesar  {{  $tagihan->penghuni->transaksi->harga_unit_kontrakan * intval( $tagihan->penghuni->tagihan_lama_huni) }}</b></p>
                    <div class="text-center">
                        <button id="pay-button" name="pay-button" type='button' class='btn btn-primary'>Bayar</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="env('MIDTRANS_CLIENT_KEY',null)"></script>
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
                            'Pembayaran Tagihan Berhasil',
                            'success'
                        ).then(function() {
                            window.location.href = '/user-profiles'
                        })
                        console.log(result);
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */

                        Swal.fire(
                            'Menunggu',
                            'Silahkan Lakukan Pembayaran Tagihan Anda',
                            'info'
                        )
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        Swal.fire(
                            'Gagal',
                            'Pembayaran Tagihan Anda Gagal',
                            'error'
                        )
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        Swal.fire(
                            'Gagal',
                            'Anda Menutup Popup Tanpa Menyelesaikan Pembayaran Tagihan',
                            'info'
                        )
                    }
                })
            });
        </script>
    </div>
    @endsection
</div>
