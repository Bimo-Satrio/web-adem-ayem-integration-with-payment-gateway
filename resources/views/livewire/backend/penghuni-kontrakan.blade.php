@section('title')
Penghuni Unit
@endsection

<div>

    <div class="container">
        @include('livewire.backend.createModalTagihan')
        @include('livewire.backend.modalUbahTagihan')
        <div wire:loading>
            Loading...
        </div>
        <section wire:loading.remove class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Penghuni Unit</h4>
                            @if (session()->has('message'))
                            <h5 class="alert alert-success">{{ session('message') }}</h5>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <input wire:model.debounce.500ms="search"  class="form-control" placeholder="Ketik Pencarian Berdasarkan Nama Penghuni Atau Unit Kontrakan..." />
                                    </div>
                                    </button>
                                </div>

                            </div>
                            <!-- table hover -->
                            <div class="table table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>ID Penghuni</th>
                                            <th>Nama Penghuni</th>
                                            <th>Nomor Telefon</th>
                                            <th>Unit</th>
                                            <th>Lama Menghuni</th>
                                            <th>Tanggal Menghuni</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @forelse($data_penghuni as $dt_pngh)
                                            <th>{{ $loop -> iteration }}</th>
                                            <th>{{ $dt_pngh->transaksi->nama_lengkap }}</th>
                                            <th>{{ $dt_pngh->transaksi->email_user }}</th>
                                            <th>{{ $dt_pngh->transaksi->nomor_telefon }}</th>
                                            <th>{{ $dt_pngh->transaksi->unit_kontrakan }}</th>
                                            <th>{{ $dt_pngh->transaksi->harga_unit_kontrakan * intval($dt_pngh->tagihan_lama_huni) }} {{ $dt_pngh->tagihan_lama_huni }}</th>
                                            <th>{{date('d F Y',strtotime($dt_pngh->transaksi->tanggal_huni))}}</th>
                                            <th>{{date('d F Y ',strtotime($dt_pngh->jatuh_tempo_tagihan ))}}</th>
                                            <th>
                                                @if ($dt_pngh->status_tagihan == 1)
                                                    <span class="badge bg-success">Tidak Memiliki Tagihan</span>
                                                @elseif($dt_pngh->status_tagihan == 2)
                                                    <span class="badge bg-danger">Belum Membayar Tagihan</span>
                                                    @elseif($dt_pngh->status_tagihan > 2)
                                                    <span class="badge bg-danger">INVALID</span>
                                                @endif
                                            </th>
                                            <th>

                                            @if ($dt_pngh->status_tagihan == 1)
                                            <div class="btn-group" role="group">
                                                <button type="submit" data-bs-toggle="modal" data-bs-target="#crateTagihanPenghuni" class="btn btn-primary" wire:click="createTagihan('{{$dt_pngh->id_penghuni}}')"><i class="bi bi-file-earmark-plus"></i>Buat Tagihan</button>
                                                <button type="submit" data-bs-toggle="modal" class="btn btn-danger" data-bs-target="#" ><i class="bi bi-trash"></i>Hapus</button>
                                                </div>
                                            @elseif($dt_pngh->status_tagihan > 1)
                                            <div class="btn-group" role="group">
                                                <button type="submit" data-bs-toggle="modal" data-bs-target="#modalUbahTagihan" class="btn btn-primary" wire:click="tagihanPenghuni('{{$dt_pngh->id_penghuni}}')"><i class="bi bi-file-earmark-plus"></i>Ubah Tagihan</button>
                                                <button type="submit" data-bs-toggle="modal" class="btn btn-danger" data-bs-target="#" ><i class="bi bi-trash"></i>Hapus</button>
                                                </div>
                                            @endif

                                            </th>

                                        </tr>
                                        @empty
                                        <tr>
                                            <td>
                                                <h5>Pencarian Tidak Ditemukan</h5>
                                            </td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $data_penghuni->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


    </div>

</div>
