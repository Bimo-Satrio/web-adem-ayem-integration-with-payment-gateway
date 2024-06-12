@section('title')
Lama Huni
@endsection

<div >

        @include('livewire.backend.modalAddLamaHuni')
        @include('livewire.backend.modalLamaHuniEdit')
        <div wire:loading>
            <div class="spinner-border text-success" style="
                                                    width: 3rem;
                                                    height: 3rem;
                                                " role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <section wire:loading.remove class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Lama Huni</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10 ">
                                </div>

                                <div class="col-md-2">
                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#modalAddLamaHuni" class="btn btn-primary">Tambahkan Lama Huni</button>
                                </div>
                            </div>
                            <!-- table hover -->
                            <div class="table table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Lama Huni</th>
                                            <th>Bulan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($dataLamaHuni as $showLamaHuni)
                                        <tr>
                                            <td>{{$loop -> iteration}}</td>
                                            <td>{{$showLamaHuni->lama_huni}}</td>
                                            <td>{{$showLamaHuni->bulan}}</td>

                                            <td>
                                                <button type="submit" data-bs-toggle="modal" data-bs-target="#modalLamaHuniEdit" class="btn btn-primary" wire:click="getID('{{$showLamaHuni->id_lama_huni}}')">Ubah</button>
                                                <button type="submit" class="btn btn-primary" wire:click="destroyLamaHuniConfirm('{{$showLamaHuni->id_lama_huni}}')">Hapus</button>
                                            </td>
                                        </tr>
                                        @empty
                                        <p>Pencarian Tidak Ditemukan</p>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $dataLamaHuni->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </section>

</div>
