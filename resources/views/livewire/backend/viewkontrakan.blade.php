<div class="container-fluid">
    <div class="container">
        <form wire:submit.prevent="editStore">
            <div class="card">
                <div class="card-body">
                    <div class="mt-4">
                        <div class="form-group">
                            <label>Unit Kontrakan</label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control" wire:model="kontrakan" readonly />
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('kontrakan') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="form-group">
                            <label>Foto Kontrakan</label>
                            <div class="row">
                                @foreach ($FotoKontrakan as $pimage)
                                <div class="col-md-4">
                                    <img src="{{asset('identitas/all') }}/{{$pimage->foto_kontrakan}}" class="img-thumbnail" height="400px" width="400px">

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-4">
                                <div class="form-group">
                                    <label>longitude</label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" wire:model="longitude" readonly />
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('longitude') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-4">


                                <label>latitude</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" wire:model="latitude" readonly />
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('latitude') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <label>Harga</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" wire:model="harga" readonly />
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <label>Stok</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" wire:model="stok" readonly />
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label>Status Huni</label>
                        <input type="text" readonly class="form-control">
                    </div>

                    <div class="mt-4">
                        <div wire:ignore>
                            <label for="summernote">Deskripsi</label>
                            <textarea name="description" id="summernote" class="form-control" wire:model="deskripsi" readonly></textarea>
                            @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>




                </div>
            </div>
        </form>
    </div>

</div>



<script>
    document.addEventListener('livewire:load', () => {
        $('#summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onChange: (contents, $editable) => {
                    @this.set('deskripsi', contents);
                }
            }
        });
    });
</script>