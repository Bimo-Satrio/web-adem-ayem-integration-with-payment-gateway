@section('title')

{{ $kontrakan->kontrakan }}


@endsection

<div>





<div class="row">

    <div class="col-md-8">


        <div class="card">

            <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators" style="margin-bottom: 100px;">
                        @foreach ($kontrakan->foto_kontrakan as $foto)
                        <button type=" button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{$loop->index}}" class="{{ $loop->first ? 'active' : ''  }}" aria-current="true" style="width: 100px;">
                            <img class="d-block w-100 rounded" src="{{asset($foto->foto_kontrakan) }}" class="img-thumbnail" />
                        </button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">

                        @foreach ($kontrakan->foto_kontrakan as $foto)
                        <div class="carousel-item {{ $loop->first ? 'active' : ''}}">
                            <img src="{{asset($foto->foto_kontrakan) }}" class="d-block w-100" alt="image">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


            </div>


        </div>

    </div>


    <div class="col-md-4">

<div class="card">

<div class="row">

<div class="col-md-8">
    <div class="card-body">
        <h5>{{$kontrakan -> kontrakan}}</h5>
    </div>
</div>

<div class="col-md-4">
    <div class="card-body">
        @if ($kontrakan->status_ketersediaan == 1)
        <span class="badge bg-success">Tersedia</span>
        @elseif($kontrakan->status_ketersediaan < 1)
        <span class="badge bg-danger">Tidak Tersedia</span>
        @endif
    </div>
</div>

</div>

    <div class="card-body">
        <p>      Rp.      {{number_format($kontrakan -> harga )   }} Perbulan</p>
        <p>{{ $kontrakan->lokasi }}</p>
        <p>Taro Mapbox Disini</p>

        <p>
            @foreach ($lama_huni as  $lm_huni )
                <p>
                    {{ $lm_huni->lama_huni }} Rp. {{ number_format(($lm_huni->bulan ) * $kontrakan->harga) }}
                </p>
            @endforeach
            {{ $kontrakan-> deskripsi }}
        </p>

        <button class="btn btn-primary" wire:click="savetoSession('{{ $kontrakan->id_kontrakan }}')">Ajukan Penyewaan</button>

    </div>
</div>
</div>
</div>






</div>
