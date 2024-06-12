@section('title')
    Beranda
@endsection

<div>


    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @if (count($getCarousel) > 0)
            @foreach ($getCarousel as $foto)

            <div class="carousel-item {{ $loop->first ? 'active' : ''}}">
                <img src="{{$foto->foto_carousel}}" class="d-block w-100" alt="image">
            </div>

            @endforeach

            @else
            <div class="carousel-item active">
                <img src="{{asset('Mazer')}}/assets/images/samples/architecture1.jpg" class="d-block w-100" alt="image">
            </div>

            @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>

    </div>


    @if (Route::has('login'))
    @guest
    @else
    @if(!Auth::user()->hasVerifiedEmail())
    <div class="alert alert-danger my-4">
        <b>{{ Auth::user()->name }}</b> Silahkan Buka Email Untuk Melakukan Verifikasi Atau Klik Halaman  <b><a href="{{ url('email/verify') }}">Berikut</a> </b>Untuk Mengirim Ulang Email Verifikasi
    </div>
    @else
    @endif
    @endguest
    @endif


    <div class="row d-flex g-4 my-4">

        @foreach ($kontrakan as $k)
        <div class="col-lg-4 col-md-6">

            <div class="card" >
                @foreach ($k->foto_kontrakan as $foto )

                <img class="card-img-top img-thumbnail" width="400px" height="400px" src="{{$foto->foto_kontrakan}}" >

                @break
                @endforeach



                <div class="card-body">
                    <a style="text-decoration-none link-light" href="{{route('single-post',$k->id_kontrakan)}}" class="stretched-link">
                    <h5 class="card-title">{{ $k -> kontrakan }} / Rp. {{number_format ($k ->harga) }} Perbulan</h5>


                    @if ($k -> status_ketersediaan == 1 and $k-> status_huni == 1 )
                    <span class="badge bg-success top-right">Tersedia</span>
                    @elseif ($k -> status_ketersediaan < 1 and $k-> status_huni < 1)
                    <span class="badge bg-danger top-right">Tidak Tersedia</span>
                    @endif

                    <h6 class="card-text">{{ $k->lokasi }}</h6>
                </a>
                </div>
            </div>



        </div>


        @endforeach
        {{ $kontrakan -> links() }}
    </div>

</div>

<div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d495.7237114706739!2d106.863172469211!3d-6.291348811502044!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1680154096867!5m2!1sen!2sid"><a href="https://www.gps.ie/sport-gps/">bike gps</a></iframe></div>
<style>
        .top-right {
        position: absolute;
        top: 0px;
        right: 0px;

    }

</style>
