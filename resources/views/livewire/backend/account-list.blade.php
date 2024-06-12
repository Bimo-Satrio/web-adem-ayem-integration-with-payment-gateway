@section('title')
List Akun

@endsection

<div >


        @include('livewire.backend.modalAddAccount')
        @include('livewire.backend.modalAccountEdit')
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
                            <h4 class="card-title">List Akun</h4>
                        </div>
                        <div class="card-body">
                            {{-- <div class="row">
                                <div class="col-md-10 ">
                                    <div class="mb-3">
                                        <input wire:model="search" id="form1" class="form-control" placeholder="Ketik Pencarian Berdasarkan Nama Lengkap Atau Email..." aria-label="Search" />
                                    </div>
                                    </button>
                                </div>

                                <div class="col-md-2">
                                    <button type="submit" data-bs-toggle="modal" data-bs-target="#AccountCreateModal" class="btn btn-primary">Buat Akun Baru</button>
                                </div>
                            </div> --}}
                            <!-- table hover -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Nama Lengkap</th>
                                            <th>Nomor Telefon</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($showAllAccount as $showAccount)
                                        <tr>

                                            <td>{{$showAccount->name}}</td>
                                            <td>{{$showAccount->email}}</td>
                                            <td>
                                                {{ $showAccount->is_admin == 1 ? 'Admin' : 'User' }}
                                            </td>
                                            <td>
                                                <button type="submit" data-bs-toggle="modal" data-bs-target="#AccountEditModal" class="btn btn-primary" wire:click="getUserId('{{$showAccount->id_user}}')">Ubah</button>
                                               <button wire:click="export('{{  $showAccount->id_user }}')" class="btn btn-primary">download</button>
                                                <button type="submit" class="btn btn-primary" wire:click="destroyUserConfirm('{{$showAccount->id_user}}')">Hapus</button>
                                            </td>
                                        </tr>
                                        @empty
                                        <p>Pencarian Tidak Ditemukan</p>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $showAllAccount->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        </section>

</div>
