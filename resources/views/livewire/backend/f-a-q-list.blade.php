@section('title')
    Pertanyaan Yang Sering Diajukan
@endsection

<div >
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

                        <h4 class="card-title">Pertanyaan Yang Sering Diajukan</h4>

                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-10">
                                {{-- <div class="mb-3">
                                    <input wire:model="search" id="form1" class="form-control" placeholder="Ketik Pencarian Berdasarkan Unit Kontrakan..." aria-label="Search" />

                                </div> --}}
                            </div>

                            <div class="col-md-2">
                                <a href="{{url('/backend/f-a-q-post')}}"><button type="submit" class="btn btn-primary"><i class="bi bi-file-earmark-plus"></i>Tambahkan Pertanyaan Yang Sering Diajukan</button></a>
                            </div>
                        </div>

                        <!-- table hover -->
                        <div class="table table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Judul Pertanyaan</th>
                                        <th>Deskripsi Pertanyaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getFAQ as $getfq)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $getfq -> judul_faq }}</td>
                                        <td>{!! Illuminate\Support\Str::of($getfq->deskripsi_faq)->words(40) !!}</td>

                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href=""><button type="submit" class="btn btn-secondary"><i class="bi bi-search"></i> Detail</button></a>
                                                <a href=""><button type="submit" class="btn btn-success"><i class=" bi bi-pencil"></i> Ubah</button></a>
                                                <button type="submit" class="btn btn-danger" wire:click="confirmationdelete({{$getfq->id_faq}})"><i class="bi bi-trash"></i> Hapus</button>
                                            </div>

                                        </td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4">
                                {{ $getFAQ->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







</div>
