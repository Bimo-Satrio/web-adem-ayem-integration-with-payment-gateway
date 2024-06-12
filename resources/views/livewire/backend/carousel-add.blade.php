<div class="container-fluid">

    <div class="container">
        <form wire:submit.prevent="carouselUpload">

            <div class="row">
                @foreach($getCarousel as $getcrs)
                <div class="col-md-4">
                    <img src="{{asset('/') }}/{{$getcrs->foto_carousel}}"" class=" img-thumbnail" height="400px" width="400px">
                    <div class="text-center mt-2">
                        <button class="btn btn-danger" wire:click.prevent='deleteCarousel({{$getcrs->id_carousel}})'><i class="bi bi-trash"></i> Hapus</button>
                    </div>
                </div>
                @endforeach
            </div>

            <label for="utama">Foto Carousel</label>
            @if($foto_carousel)
            @foreach($foto_carousel as $file)
            <img src="{{ $file->temporaryUrl() }}" class="img-thumbnail" height="400px" width="400px">
            @endforeach
            @endif
            <div class="my-4">
                <input type="file" multiple wire:model.list="foto_carousel" id="utama" class="form-control">
            </div>
            @error('foto_carousel') <span class="error">{{ $message }}</span> @enderror
            <button type="submit" class="btn btn-primary">Upload Foto Carousel</button>
        </form>
    </div>

</div>