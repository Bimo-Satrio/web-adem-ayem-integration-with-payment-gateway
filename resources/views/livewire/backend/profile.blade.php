<div>
        <div class="card">
            <div class="card-body">
               <form wire:submit.prevent = "saveEditProfile">
        <h2 class="text-center">{{ Auth::user()->name }}</h2>
        <div class="text-center">
        <img class="img-thumbnail" width="400px" height="400px"
        @if (Auth::user()->avatar == NULL)
        src="https://ui-avatars.com/api/?name={{Auth::user()->name}}&rounded=true"
        @else
        src="{{ asset(Auth::user()->avatar) }}">
        @endif
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

    <div class="card-footer text-end">

        <button type="submit" class="btn btn-primary">Simpan</button>


    </div>

        </form>
    </div>
</div>
</div>
