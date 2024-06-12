@section ('title')
FAQ

@endsection

<div class="col-12 col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Pertanyaan Yang Sering Ditanyakan</h4>
        </div>
        <div class="card-body">

            @foreach($getFAQ as $getfq)
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$getfq->id_faq}}" aria-expanded="false" aria-controls="flush-collapseOne">
                            {{ $getfq -> judul_faq }}
                        </button>
                    </h2>
                    <div id="flush-collapseOne{{$getfq->id_faq}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            {!! $getfq->deskripsi_faq !!}
                        </div>
                    </div>
                </div>

            </div>

            @endforeach
        </div>
    </div>
</div>
