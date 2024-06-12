<div class="container-fluid">

    <div class="container">

        <div class="row">


            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        {{ $transaksi -> id_transaksi }}
                        <h5>Rincian Penyewa</h5>
                        <p>Email : {{$transaksi-> email}} </p>
                        <p>Nama Lengkap : {{$transaksi-> name}} </p>
                        <p>Nomor Handphone : {{$transaksi-> password}} </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-center">Rincian Sewa Unit Kontrakan</h5>
                        <p class="text-center">Unit Kontrakan : {{$transaksi -> kontrakan}}</p>
                        <p class="text-center"> Carousel </p>
                        <p class="text-center"><b> Silahkan Melakukan Pembayaran Sebesar : {{ number_format ($transaksi -> harga_total) }}</b></p>

                        <div class="text-center">
                            <button id="pay-button" name="pay-button" type='button' class='btn btn-primary' wire:click="updateStatusTransaksi({{ $transaksi->id_transaksi }})">Bayar</button>
                        </div>

                    </div>
                </div>
            </div>




            <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-DKWVzHivdFzVpE5r"></script>
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
                                window.location.href = '/payments-success/{{$transaksi->id_transaksi}}'
                            })
                            console.log(result);
                        },
                        onPending: function(result) {
                            /* You may add your own implementation here */
                            alert("wating your payment!");
                            console.log(result);
                        },
                        onError: function(result) {
                            /* You may add your own implementation here */
                            alert("payment failed!");
                            console.log(result);
                        },
                        onClose: function() {
                            /* You may add your own implementation here */
                            alert('you closed the popup without finishing the payment');
                        }
                    })
                });
            </script>


        </div>

    </div>

</div>

</div>
