<div >

        <form wire:submit.prevent="store" enctype="multipart/form-data">

            <div class="card">
                <div class="card-body">
                    <div class="mt-4">
                        <div class="form-group">
                            <label>Unit Kontrakan</label>
                            <div class="form-group position-relative has-icon-left">
                                <input required type="text" class="form-control @if($errors->has('kontrakan')) is-invalid @elseif($kontrakan == NULL)  @else is-valid @endif" wire:model.debounce.500ms="kontrakan" />
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('kontrakan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                    </div>


                    <div class="mt-4">
                        <div class="form-group">
                            <label for="utama">Foto Kontrakan</label>
                            <input required type="file" multiple wire:model.debounce.500ms="images" id="utama" class="form-control">
                            @error('images') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-4">
                                <div class="form-group">
                                    <label>longitude</label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" wire:model.debounce.500ms="long" readonly />
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
                                    <input type="text" class="form-control" wire:model.debounce.500ms="lat" readonly />
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
                            <div class="mt-4">
                                <div class="form-group">
                                    <label>Harga Perbulan (Rp.)</label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input required type="text" class="form-control  @if($errors->has('harga')) is-invalid @elseif($harga == NULL)  @else is-valid @endif" wire:model.debounce.500ms="harga" />
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-4">
                                <div class="form-group">
                                    <label>Status Ketersediaan</label>
                                    <select required class="form-control" wire:model.debounce.500ms="status_ketersediaan">
                                        <option value="0">Tidak Tersedia</option>
                                        <option value="1">Tersedia</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label>Status Huni</label>
                        <select required class="form-control" wire:model.debounce.500ms="status_huni">
                            <option value="0">Sudah Dihuni</option>
                            <option value="1">Belum Dihuni</option>
                        </select>
                    </div>


                    <div class="mt-4">
                        <div wire:ignore>
                            <label for="summernote">Deskripsi</label>
                            <textarea name="description" id="summernote" required class="form-control" wire:model.debounce.500ms.debounce.500ms="deskripsi"></textarea>
                            @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>


                    <div class="mt-4">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>

        </form>

    <script>
        marker.on('dragend', function(e) {
            //here you can get the coordinates as follows
            const long = e.target.getLngLat().lng
            const lat = e.target.getLngLat().lat

            // @this.long = long
            // @this.lat = lat
            console.log({
                long,
                lat
            })
        });
    </script>

    <script>
        geocoder.on('result', function(event) {



            const long = event.result.geometry.coordinates[0];
            const lat = event.result.geometry.coordinates[1];
            const name = name = event.result.place_name;

        });
    </script>

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
</div>

