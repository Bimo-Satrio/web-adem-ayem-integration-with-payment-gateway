@section('title')
    Upload Identitas
@endsection

<div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ Route('home') }}">Pengajuan Penyewaan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Upload Identitas</li>
        </ol>
      </nav>

    @if($transaksi -> status_identitas == 1)

    <div class="card" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
        <div class="card-body">
            <h5>Upload Identitas</h5>
            <form wire:submit.prevent="store">
                <div class="input-group mb-3">

                    <p>Upload Foto Kartu Tanda Penduduk (KTP)</p>
                    <div class="input-group mb-3">

                        @if ($foto_kartu_tanda_penduduk)
                        Preview :
                        <img src="{{ $foto_kartu_tanda_penduduk->temporaryUrl() }}" class="img-thumbnail" width="400px" height="400px">
                        @endif
                        <label class="input-group-text @if($errors->has($foto_kartu_tanda_penduduk)) is-invalid @elseif ($foto_kartu_tanda_penduduk == NULL) @else is-valid @endif  "><i class="bi bi-upload"></i></label>
                        <input wire:loading.attr="disabled" wire:model="foto_kartu_tanda_penduduk" type="file" name="foto_kartu_tanda_penduduk" class="form-control" />
                        @error('foto_kartu_tanda_penduduk') <span class="text-danger">{{ $message }}</span> @enderror

                    </div>


                </div>

                <div class="input-group mb-3">
                    <p>Upload Foto Kartu Keluarga (KK)</p>
                    <div class="input-group mb-3">
                        @if ($foto_dengan_kartu_tanda_penduduk)
                        Preview :
                        <img src="{{ $foto_dengan_kartu_tanda_penduduk->temporaryUrl() }}" class="img-thumbnail" width="400px" height="400px">
                        @endif
                        <label class="input-group-text @if($errors->has($foto_dengan_kartu_tanda_penduduk)) is-invalid @elseif ($foto_dengan_kartu_tanda_penduduk == NULL) @else is-valid @endif  "><i class="bi bi-upload"></i></label>
                        <input wire:loading.attr="disabled" wire:model="foto_dengan_kartu_tanda_penduduk" type="file" name="foto_dengan_kartu_tanda_penduduk" class="form-control" />
                        @error('foto_dengan_kartu_tanda_penduduk') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>



                <div class="input-group mb-3">
                    <p>Upload Foto Dengan Kartu Tanda Penduduk (KTP)</p>
                    <div class="input-group mb-3">
                        @if ($foto_kartu_keluarga)
                        Preview :
                        <img src="{{ $foto_kartu_keluarga->temporaryUrl() }}" class="img-thumbnail" width="400px" height="400px">
                        @endif
                        <label class="input-group-text @if($errors->has($foto_kartu_keluarga)) is-invalid @elseif ($foto_kartu_keluarga == NULL) @else is-valid @endif  "><i class="bi bi-upload"></i></label>
                        <input wire:loading.attr="disabled" wire:model="foto_kartu_keluarga" type="file" name="foto_kartu_keluarga" class="form-control" />
                        @error('foto_kartu_keluarga') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>




                <div class="my-4">

                    <div class="progress" x-show="isUploading">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" :style="`width:${progress}%`"></div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-primary">
                        Upload

                    </button>
                </div>



            </form>


        </div>


    </div>
    @elseif($transaksi->status_identitas < 0 or $transaksi->status_transaksi > 1)
    <script>
        window.location = "/payments-pending";
    </script>



    @endif




</div>
