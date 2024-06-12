<div>

    @include('livewire.modalUserProfileEdit')


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ Route('home') }}">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
      </nav>


<div class="text-center">
    <div class="card" >
        <div class="card-body">
            <h4 class="card-title">Profile Saya</h4>
            <div class="avatar avatar-lg my-4">


                    @if(Auth::user()->avatar == NULL)
                    <img  class="text-center" src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&rounded=true" />
                    @else


                   <img  class="text-center" src="{{asset(Auth::user()->avatar) }}" />
                    @endif

            </div>


            <div class="mb-4">
                <div class="mb-4">
                    <p>Email {{Auth::user()->email}}</p>
                    <p>Nama Lengkap {{Auth::user()->name}}</p>
                    <p>Nomor Telefon {{Auth::user()->no_telefon}}


                    </p>
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditProfile" wire:click="editProfile('{{Auth::user()->id_user}}')">Ubah Profile</button>
               <br>
                 <br>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEditPassword" wire:click="editPassword('{{Auth::user()->id_user}}')">Ubah Password</button>
            </div>
        </div>

    </div>


    {{-- <div class="row">
        <div class="col-md-3">

        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <section class="section">
                        <div class="row" id="table-borderless">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Tagihan Unit Kontrakan {{Auth::user()->name}}</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nomor</th>
                                                            <th>ID Tagihan</th>
                                                            <th>Unit Kontrakan</th>
                                                            <th>Harga Tagihan</th>
                                                            <th>Status Tagihan</th>
                                                            <th>Tanggal</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @forelse($getTagihanPenghuni as $tagihan)
                                                        <tr>

                                                           <td> {{ $loop->iteration }}</td>

                                                       <td>{{ $tagihan->id_tagihan_penghuni }}</td>
                                                       <td> {{ $tagihan->penghuni->transaksi->unit_kontrakan }}</td>
                                                       <td>Rp. {{ number_format($tagihan->penghuni->transaksi->harga_unit_kontrakan * intval ($tagihan->penghuni->tagihan_lama_huni)) }} {{ $tagihan->penghuni->tagihan_lama_huni }}</td>
                                                    <td> @if ($tagihan->status_tagihan == 1)
                                                            <span class="badge bg-danger">Tagihan Belum Dibayar</span>
                                                        @else
                                                        <span class="badge bg-primary">Tagihan Telah Dibayar </span>
                                                            @endif
                                                    </td>
                                                    <td>{{ $tagihan->created_at }}</td>
                                                     <td>
                                                        @if ($tagihan->status_tagihan == 1)
                                                        <a href="{{ route('paymentsTagihan',['id_tagihan_penghuni' => $tagihan->id_tagihan_penghuni]) }}"><button class="btn btn-primary btn-sm">Bayar</button></a></td>

                                                       @else

                                                        @endif
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td class="badge bg-danger">Anda Belum Memiliki Tagihan</td>
                                                        </tr>

                                                        @endforelse
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div> --}}

</div>
