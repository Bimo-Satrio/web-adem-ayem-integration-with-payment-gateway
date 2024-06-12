@section('title')
Waiting List Unit
@endsection


<div>
    @include('livewire.backend.modalAddWaitingList')
     <!-- Bordered table start -->
     <section class="section">
        <div class="row" id="table-bordered">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Waiting List Unit</h4>
              </div>
              <div class="card-content">
                <div class="card-body">


                    <div class="my-4">


<div class="row">

    <div class="col-8 col-md-10">



    </div>


    <div class="col-4 col-md-2">

        <button class="btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#modalAddWaitingList">Tambahkan Waiting List Unit</button>

    </div>

</div>


</div>

                <!-- table bordered -->
                <div class="table-responsive">
                  <table class="table table-bordered table-hover mb-0">
                    <thead>
                      <tr>
                        <th>Nomor</th>
                        <th>ID Waiting List</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Nomor Telefon</th>
                        <th>Unit </th>
                        <th>Tanggal Pendaftaran</th>
                        <th>Status Waiting List</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($waitingList as  $waiting)
                      <tr>

                        <td>{{ $waiting->user->nama_lengkap }}</td>
                        <td>{{ $waiting->user->email }}</td>
                        <td>{{ $waiting->user->no_telefon }}</td>
                        <td>{{ $waiting->kontrakan->kontrakan }}</td>
                        <td>{{ $waiting->tanggal_pengajuan }}</td>
                        <td>


                        @if ($waiting->kontrakan->status_ketersediaan < 1 and $waiting->kontrakan->status_huni < 1 )
                            <span class="badge bg-warning">Menunggu Ketersediaan</span>
                        @elseif ($waiting->kontrakan->status_ketersediaan > 1 and $waiting->kontrakan->$status_huni > 1 )
                            <span class="badge bg-primary">Sudah Tersedia</span>





                        @elseif ($waiting->status_waiting_list == 1)
                        <span class="badge bg-primary">Selesai</span>
                        @endif</td>
                        <td>

                            @if ($waiting->status_waiting_list == 0)
                            <button class="btn btn-success btn-sm" wire:click="selesai('{{ $waiting->id_waiting_list }}')">Selesai</button>


                            @elseif($waiting->status_waiting_list == 1)

                            <button class="btn btn-danger btn-sm" wire:click="hapusWaiting('{{ $waiting->id_waiting_list }}')">Hapus</button>
                            @endif




                        </td>
                        @empty
                      </tr>
                      <h3>Kosong</h3>

                    </tbody>
                    @endforelse
                  </table>
                  <div class="mt-4">
                  {{ $waitingList -> links() }}
                </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Bordered table end -->
</div>
