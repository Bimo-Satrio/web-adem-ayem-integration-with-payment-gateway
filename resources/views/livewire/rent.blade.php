<div>
    @if (Session::has('sessionRent'))
    @forelse(Session::get('sessionRent') as $rent)
    @include('livewire.modalEditProfile')
    <!-- Main content -->
    <div class="row">
        <div class="col-md-8">
            <!-- Details -->
            <div class="card mb-4">
                <div class="card-body">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ Route('home') }}">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Pengajuan Penyewaan</li>
        </ol>
</nav>


<div class="row">


    <div class="col-8 col-md-8">
        {{-- <img class="img-thumbnail" src="{{ asset($rent['foto_kontrakan']['foto_kontrakan']) }}" width="200px" height="200px" style="float:left; margin-right:10px;"> --}}
           <a href="{{ route('single-post',$rent['id_kontrakan']) }}"><h6>{{ $rent['unit_kontrakan'] }}</h6></a>
    </div>

    <div class="col-4 col-md-4">
        <button class="btn btn-danger" wire:loading.attr="disabled" wire:click="destroySessionRent">
            <span wire:loading.remove wire:target="destroySessionRent">
                <i class="bi bi-trash"></i> Hapus
            </span>
            <span wire:loading wire:target="destroySessionRent">
                <i class="bi bi-trash"></i> Menghapus
            </span>

        </button>
    </div>


</div>



                        <h6>{{ $rent['lokasi'] }}</h6>

                        <div class="row">
<div class="col-8 col-md-8">





<h6>Harga
</h6>
</div>


<div class="col-4 col-md-4">

<h6>Rp. {{ number_format($rent['harga_unit_kontrakan'])  }} Perbulan</h6>

</div>



</div>
<label for="tanggal_huni"><h6>Tanggal Mulai Huni</h6></label>
<input class="form-control" type="date" wire:model="tanggal_huni" id="tanggal_huni">

<br>
<select class="form-select" wire:model="lama_huni_select">

    @if($lama_huni_select == NULL)

    <option selected>Pilih Lama Huni</option>
    @foreach ($lama_huni as $lm_huni )
    <option value="{{intval($lm_huni->lama_huni)  }}">{{$lm_huni->lama_huni}}</option>

    @endforeach

    @else

    <option selected disabled>Pilih Lama Huni</option>
    @foreach ($lama_huni as $lm_huni )
    <option value="{{intval($lm_huni->lama_huni)  }}">{{$lm_huni->lama_huni}}</option>
    @endforeach
    @endif
  </select>


<hr>


<div class="row">
<div class="col-8 col-md-8">
</div>


<div class="col-4 col-md-4">
        @if ($lama_huni_select == NULL)
        @else
        <h6>Rp. {{ number_format($lama_huni_select * $rent['harga_unit_kontrakan'])  }} </h6>
        @endif
</div>

<div class="row">

<div class="col-8 col-md-8">
    <h6>Pajak Pertambahan Nilai (PPN)  </h6>

</div>
<div class="col-4 col-md-4">
<h6>Rp. {{ number_format($ppn) }}</h6>
</div>
</div>


<div class="row">

<div class="col-8 col-md-8">
<h6>Total</h6>

</div>

<div class="col-4 col-md-4">
@if ($lama_huni_select == NULL)

    @else

    <h6>Rp. {{number_format($ppn + $lama_huni_select * $rent['harga_unit_kontrakan'])  }}</h6>

    @endif

</div>

</div>



</div>




@empty


@endforelse
                </div>
            </div>
        </div>


        <div class=" col-md-4">

            <div class="card mb-4">

                <div class="card-body">
                    <h3 class="h6">Rincian Penyewa</h3>

                    <address>
                        <strong>Nama Lengkap : {{ Auth::user()->nama_lengkap }}</strong><br>
                        <strong>Email : {{ Auth::user()->email }}</strong><br>
                        <strong>Nomor Telefon : {{ Auth::user()->no_telefon}}</strong>



                    </address>

                    <hr>

                    {{-- <strong>Terdapat Kesalahan Pada Rincian Penyewa ? Sillahkan Lakukan Perubahan Pada Menu</strong>
                    <span><a href="#" data-bs-toggle="modal" data-bs-target="#modalEditProfile" class="text-decoration-underline" wire:click="editProfile('{{Auth::user()->id_user}}')" target="_blank">Berikut</a> </span> --}}


                  <p>Dengan Menekan Tombol Upload Identitas
                    Anda Berarti Setuju Dengan
                    <span>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" class="text-decoration-underline" target="_blank">
                        Syarat dan Ketentuan Kontrakan Adem Ayem</a>
                    </span>
                </p>
                    <button class="btn btn-primary" wire:loading.attr="disabled" wire:click="storeSessionRent">
                        <span wire:loading.remove wire:target="storeSessionRent">
                         Upload Identitas
                        </span>

                        <span wire:loading wire:target="storeSessionRent">
                         Upload Identitas
                        </span>

                    </button>

                </div>
            </div>
        </div>
    </div>




    @else
    <script>
        window.location = ('/')
    </script>

    @endif


    <style>
        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: 1rem;
        }

        .text-reset {
            --bs-text-opacity: 1;
            color: inherit !important;
        }

        a {
            color: #5465ff;
            text-decoration: none;
        }
    </style>






    <!-- Vertically Centered modal Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        <b>Syarat dan Ketentuan</b>
                    </h5>

                </div>
                <div class="modal-body">
                    @forelse($tentangModel as $tentang)

                    @empty
                    <h1>KOSONG !!!!!!</h1>

                    @endforelse

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>
