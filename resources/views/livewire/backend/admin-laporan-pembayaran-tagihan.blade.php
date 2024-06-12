<div>

    <div class="card">

        <div class="card-body">
            <h5>Laporan Pembayaran Tagihan Penghuni</h5>
        </div>

    </div>


    <div class="card">

        <div class="card-body">

            <form wire:submit.prevent="filter">



             <div class="my-4">

                <div class="my-4">
                    <label for="dari"><h5>Tanggal Dari</h5></label>
                    <input type="date" class="form-control" wire:model="dari" id="dari">

                </div>


                <div class="my-4">
                    <label for="sampai"><h5>Tanggal Sampai</h5></label>
                    <input type="date" class="form-control" wire:model="sampai" id="sampai">

                </div>

                <button class="btn btn-primary" type="submit">Tampilkan</button>
              </div>
            </form>


            @if ($tagihan_penghuni == NULL)
            <h5></h5>
            @else

                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach ( $tagihan_penghuni as $tagihan)
                              <tr>

                                <th scope="row"> {{ $tagihan->id_tagihan_penghuni }}</th>
                                <td colspan="2">Larry the Bird</td>
                                {{-- <td colspan="3">{{ $tagihan->harga_unit_kontrakan_total * intval($tagihan->lama_huni_unit_kontrakan) }}</td> --}}
                               {{-- @php
                                   $total += $tagihan->harga_unit_kontrakan_total * intval($tagihan->lama_huni_unit_kontrakan);
                               @endphp --}}
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                {{ $total }}
                            </tfoot>
                          </table>
            @endif

        </div>

    </div>








</div>
