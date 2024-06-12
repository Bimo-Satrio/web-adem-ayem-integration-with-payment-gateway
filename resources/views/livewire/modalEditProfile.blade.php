<div wire:ignore.self class="modal fade" id="modalUbahProfilePemilik" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <form wire:submit.prevent="saveEditProfile">
                <div class="modal-body">
                    <div class="my-4">
                        <div class="input-group">
                            <label for="nama_lengkap" class="input-group-text"><i class="bi bi-person"></i>Nama Lengkap</label>
                            <input type="text" class="form-control  @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Nama Lengkap" wire:loading.attr="disabled" wire:model.debounce.500ms="nama_lengkap" />

                        </div>
                        @error('nama_lengkap') <span class="error">Silahkan Isi Nama Lengkap</span> @enderror

                    </div>


                    <div class="my-4">
                        <div class="input-group">

                            <label for="email" class="input-group-text"><i class="bi bi-envelope"></i>Email</label>
                            <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Email" wire:loading.attr="disabled" wire:model.debounce.500ms="email" />

                        </div>
                        @error('email') <span class="error">Silahkan Isi Email</span> @enderror
                    </div>



                    <div class="my-4">
                        <div class="input-group">
                            <label for="nomor_telefon" class="input-group-text"><i class="bi bi-123"></i>Nomor Telefon (+62)</label>
                            <input type="text" class="form-control  @error('nomor_telefon') is-invalid @enderror" id="nomor_telefon" placeholder="Nomor Telefon" wire:loading.attr="disabled" wire:model.debounce.500ms="nomor_telefon" />

                        </div>
                        @error('nomor_telefon') <span class="error">Silahkan Isi Nomor Telefon</span> @enderror
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
