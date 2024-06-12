@section('title')
Foto Halaman Beranda
@endsection
<div>

    <div class="container">


        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @if (count($getCarousel) > 0)
                @foreach ($getCarousel as $foto)

                <div class="carousel-item {{ $loop->first ? 'active' : ''}}">
                    <img src="{{asset('/') }}/{{$foto->foto_carousel}}" class="d-block w-100" alt="image">
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
        <div class="card">
            <div class="card-body text-center">
                <a href="{{url('/backend/carousel-add')}}"><button class="btn btn-primary ">Upload Foto Halaman Beranda</button></a>

            </div>

        </div>


    </div>

</div>
