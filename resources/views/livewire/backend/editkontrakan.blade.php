<div>

        <form wire:submit.prevent="editStore">

            <div class="card">
                <div  class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ route('unitkontrakan') }}">Unit Kontrakan</a></li>
                          <li class="breadcrumb-item {{ request()->is('/backend/editkontrakan') ? 'active' : '' }}" aria-current="page">Edit Unit Kontrakan</li>
                        </ol>
                      </nav>
                  <h3 class="text-center">{{  $kontrakan }}</h3>
                </div>
            </div>

            <div class="card">

                <div class="card-body">
                    <div class="mt-4">
                        <div class="form-group">
                            <label>Unit Kontrakan</label>
                            <div class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control  @if($errors->has('kontrakan')) is-invalid @elseif($kontrakan == NULL)  @else is-valid @endif" wire:model="kontrakan" />
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                                @error('kontrakan') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="form-group">
                            <div class="mt-4">
                                <div class="form-group">
                                    <label>Foto Kontrakan</label>
                                    <input type="file" multiple wire:model="images" id="utama" class="form-control">
                                    @error('images') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="row">
                                @foreach ($FotoKontrakan as $pimage)
                                <div class="col-md-4">
                                    <img src="{{asset($pimage->foto_kontrakan) }}" class="img-thumbnail" height="400px" width="400px">
                                    <div class="text-center mt-2">
                                        <button class="btn btn-danger" wire:click.prevent='deletefoto({{$pimage->id_foto_kontrakan}})'><i class="bi bi-trash"></i> Hapus</button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-4">
                                <div class="form-group">
                                    <label>Longitude</label>
                                    <div class="form-group position-relative has-icon-left">
                                        <input type="text" class="form-control" wire:model="longitude" />
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


                                <label>Latitude</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control" wire:model="latitude" />
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
                            <div class="form-group ">
                                <label>Harga Perbulan (Rp.)</label>
                                <div class="form-group position-relative has-icon-left">
                                    <input type="text" class="form-control  @if($errors->has('harga')) is-invalid @elseif($harga == NULL)  @else is-valid @endif" wire:model="harga"  />
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
                        <select class="form-control" wire:model.debounce.500ms="status_huni">
                            <option value="0">Belum Dihuni</option>
                            <option value="1">Sudah Dihuni</option>

                        </select>
                    </div>

                    <div class="mt-4">
                        <div wire:ignore>
                            <label for="summernote">Deskripsi</label>
                            <textarea name="description" id="summernote" class="form-control" wire:model="deskripsi"></textarea>
                            @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>



                    <div class="mt-4">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>





        <script>
            document.addEventListener('livewire:load', () => {
                $('#summernote').summernote({
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
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


