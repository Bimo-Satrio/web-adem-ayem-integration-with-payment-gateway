<div wire:ignore.self class="modal fade" id="modalEditProfile" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <form wire:submit.prevent="saveEditProfile">
                <div class="modal-body" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">

                    <div class="my-4">
                        @if(Auth::user()->avatar == NULL)
                        <h5 class="text-center">Foto Profile</h5>
                        <br>
                        <img class="img-responsive" src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&rounded=true">


                        <hr>

                        <label for="">Ubah Foto Profile</label>
                        <input type="file" class="form-control" wire:loading.attr="disabled" wire:model=addProfilePicture>
                        @error('addProfilePicture') <span class="error">{{$message}}</span> @enderror
                        @else
                        <h5 class="text-center">Foto Profile</h5>
                        <br>
                        <img class="img-add img-thumbnail" src="{{ asset(Auth::user()->avatar) }}">
                        <hr>
                        <label for="">Ubah Foto Profile</label>
                        <input type="file" class="form-control" wire:loading.attr="disabled" wire:model=addProfilePicture>
                        @error('addProfilePicture') <span class="error">{{$message}}</span> @enderror

                        @endif
                    </div>

                    <div class="my-4">
                        <div class="progress" x-show="isUploading">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" :style="`width:${progress}%`"></div>
                        </div>
                    </div>

                    <div class="my-4">
                        <div class="input-group">
                            <label for="editNameProfile" class="input-group-text"><i class="bi bi-person"></i>Nama Lengkap</label>
                            <input type="text" class="form-control  @error('editNameProfile') is-invalid @enderror" id="editNameProfile" placeholder="Nama Lengkap" wire:loading.attr="disabled" wire:model.debounce.500ms="editNameProfile" />

                        </div>
                        @error('editNameProfile') <span class="error">Silahkan Isi Nama Lengkap</span> @enderror

                    </div>


                    <div class="my-4">
                        <div class="input-group">

                            <label for="emailEditProfile" class="input-group-text"><i class="bi bi-envelope"></i>Email</label>
                            <input type="text" class="form-control  @error('emailEditProfile') is-invalid @enderror" id="emailEditProfile" placeholder="Email" wire:loading.attr="disabled" wire:model.debounce.500ms="emailEditProfile" />

                        </div>
                        @error('emailEditProfile') <span class="error">Silahkan Isi Email</span> @enderror
                    </div>



                    <div class="my-4">
                        <div class="input-group">
                            <label for="noTelefonEditProfile" class="input-group-text"><i class="bi bi-123"></i>Nomor Telefon (+62)</label>
                            <input type="text" class="form-control  @error('noTelefonEditProfile') is-invalid @enderror" id="noTelefonEditProfile" placeholder="Nomor Telefon" wire:loading.attr="disabled" wire:model.debounce.500ms="noTelefonEditProfile" />

                        </div>
                        @error('noTelefonEditProfile') <span class="error">Silahkan Isi Nomor Telefon</span> @enderror
                    </div>






                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>


                </div>
            </form>
        </div>
    </div>
</div>





<style>
    .img-responsive {
        position: relative;
        left: 50%;
        top: 50%;
        margin-top: -25px;
        /* This needs to be half of the height */
        margin-left: -25px;
        /* This needs to be half of the width */
    }
</style>


<style>
    .img-add {
        height: 200px;
        width: 200px;
        position: relative;
        left: 50%;
        top: 50%;
        margin-top: -25px;
        /* This needs to be half of the height */
        margin-left: -80px;
        /* This needs to be half of the width */
    }
</style>
