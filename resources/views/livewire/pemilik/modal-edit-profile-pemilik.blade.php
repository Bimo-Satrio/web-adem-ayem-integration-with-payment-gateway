<div wire:ignore.self class="modal fade" id="modaleditProfilePemilik" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <form wire:submit.prevent="saveEditProfile">

                <div class="modal-header">

                    @if (Auth::user()->avatar == NULL)
                    <img  class="img-thumbnail img-rounded image-responsive" src="https://ui-avatars.com/api/?name={{Auth::user()->username}}&rounded=true"/>
                    @else

                    <img  class="img-thumbnail img-rounded image-responsive" src="{{Auth::user()->avatar}}"/>
                    @endif



                </div>

                <div class="modal-body">



                    <div class="my-4">
                        <div class="input-group">
                            <label for="username" class="input-group-text"><i class="bi bi-person"></i>Username</label>
                            <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username" placeholder="" wire:loading.attr="disabled" wire:model.debounce.500ms="username" />

                        </div>
                        @error('nama_lengkap') <span class="error">{{ $message }}</span> @enderror

                    </div>

                    <div class="my-4">
                        <div class="input-group">
                            <label for="nama_lengkap" class="input-group-text"><i class="bi bi-person"></i>Nama Lengkap</label>
                            <input type="text" class="form-control  @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="" wire:loading.attr="disabled" wire:model.debounce.500ms="nama_lengkap" />

                        </div>
                        @error('nama_lengkap') <span class="error">{{ $message }}</span> @enderror

                    </div>


                    <div class="my-4">
                        <div class="input-group">

                            <label for="email" class="input-group-text"><i class="bi bi-envelope"></i>Email</label>
                            <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="" wire:loading.attr="disabled" wire:model.debounce.500ms="email" />

                        </div>
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>



                    <div class="my-4">
                        <div class="input-group">
                            <label for="nomor_telefon" class="input-group-text"><i class="bi bi-123"></i>Nomor Telefon (+62)</label>
                            <input type="text" class="form-control  @error('nomor_telefon') is-invalid @enderror" id="nomor_telefon" placeholder="{{ $no_telefon }}" wire:loading.attr="disabled" wire:model.debounce.500ms="no_telefon" />

                        </div>
                        @error('no_telefon') <span class="error">{{ $message }}</span> @enderror
                    </div>






                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit"  class="btn btn-primary">Simpan</button>


                </div>
            </form>
        </div>
    </div>
</div>


<style>


    .image-responsive {
        margin-left:auto;
        margin-right:auto;
        display: block;



    }
</style>
