<div wire:ignore.self class="modal fade" id="AccountCreateModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <form wire:submit.prevent="userAdd">
                <div class="modal-body">
                    <div class="my-4">
                        <div class="form-group">
                            <label for="basicInput">Nama Lengkap</label>
                            <input type="text" class="form-control  @if($errors->has('name')) is-invalid @elseif($name == NULL)  @else is-valid @endif" id="basicInput" placeholder="Nama Lengkap" wire:model.debounce.300ms="name" />
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>


                    <div class="my-4">
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="text" class="form-control  @if($errors->has('email')) is-invalid @elseif($email == NULL)  @else is-valid @endif" id="inputEmail" placeholder="Email" wire:model.debounce.300ms="email" />

                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <div class="my-4">
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control  @if($errors->has('password')) is-invalid @elseif($password == NULL)  @else is-valid @endif" id="inputPassword" placeholder="Password" wire:model.debounce.300ms="password" />
                            @error('password') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>


                    <div class="my-4">
                        <div class="form-group">
                            <label for="password-confirm">Konfirmasi Password</label>
                            <input type="password" class="form-control  @if($errors->has('password_confirmation')) is-invalid @elseif($password_confirmation == NULL)  @else is-valid @endif" id="password-confirm" wire:model.debounce.300ms="password_confirmation" placeholder="Konfirmasi Password" />
                            @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <div class="my-4">
                        <label for="selectedRoles">Roles</label>
                        <select class="form-select" wire:model="selectedRoles" id="selectedRoles">
                            <option selected>Pilih</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Proses</button>


                </div>
            </form>
        </div>
    </div>
</div>