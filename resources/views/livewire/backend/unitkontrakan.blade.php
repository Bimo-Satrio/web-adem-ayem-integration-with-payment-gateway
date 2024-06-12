@section('title')
Unit
@endsection

<div>
    @include('livewire.backend.showModalAdd')
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

                        <h4 class="card-title">Unit</h4>
                        @if (session()->has('message'))
                        <h5 class="alert alert-success">{{ session('message') }}</h5>
                        @endif
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-2 col-md-10">
                                {{-- <div class="mb-3">
                                    <input wire:model="search" id="form1" class="form-control" placeholder="Ketik Pencarian Berdasarkan Unit ..." aria-label="Search" />

                                </div> --}}
                            </div>

                            <div class="col-2 col-md-2">
                                <a href="{{url('/backend/postkontrakan')}}"><button type="submit" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i >Tambahkan Unit </button></a>
                            </div>
                        </div>

                        <!-- table hover -->
                        <div class="table table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Unit</th>
                                        <th>Foto Unit</th>
                                        <th>Deskripsi</th>
                                        <th>Lokasi</th>
                                        <th>Latitude</th>
                                        <th>Longtitude</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($data_kontrakan as $k)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $k -> kontrakan }}</td>
                                        <td>

                                            @foreach ($k->foto_kontrakan as $foto)

                                            <img src="{{asset($foto->foto_kontrakan)}}" class="img-thumbnail" height="400px" width="400px">
                                            @break
                                            @endforeach


                                        </td>

                                        <td>{!!  Str::words($k->deskripsi, $words = 40, '...') !!}</td>
                                        <td>{{ $k -> lokasi }}</td>
                                        <td>{{ $k -> harga }}</td>
                                        <td>{{ $k -> stok }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('viewkontrakan', ['id_kontrakan' => $k->id_kontrakan]) }}"><button type="submit" class="btn btn-secondary"><i class="bi bi-search"></i> Detail</button></a>
                                                <a href="{{ route('editkontrakan', ['id_kontrakan' => $k->id_kontrakan]) }}"><button type="submit" class="btn btn-success"><i class=" bi bi-pencil"></i> Edit</button></a>
                                                <button type="submit" class="btn btn-danger" wire:click="confirmationdelete('{{$k -> id_kontrakan}}')"><i class="bi bi-trash"></i> Hapus</button>
                                            </div>
                                            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#PenghuniModal" wire:click="addPenghuni('{{$k -> id_kontrakan}}')"><i class="bi bi-person-plus"></i> Tambahkan Penghuni</button>
                                        </td>


                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $data_kontrakan->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







</div>
