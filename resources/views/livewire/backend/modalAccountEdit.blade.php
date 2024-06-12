<div wire:ignore.self class="modal fade" id="AccountEditModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <form wire:submit.prevent="userUpdate">
                <div class="modal-body">
                    <div class="my-4">
                        <div class="form-group">
                            <label for="nameUpdate">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nameUpdate" placeholder="Nama Lengkap" wire:model.debounce.300ms="nameUpdate" />
                            @error('nameUpdate') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>


                    <div class="my-4">
                        <div class="form-group">
                            <label for="emailUpdate">Email</label>
                            <input type="text" class="form-control" id="emailUpdate" placeholder="Email" wire:model.debounce.300ms="emailUpdate" />
                            @error('emailUpdate') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>




                    <div class="my-4">
                        <div class="form-group">
                            <label for="current_roles">Roles Saat Ini</label>
                            <input type="text" class="form-control" id="current_roles" wire:model="currentRoles" readonly>
                        </div>
                    </div>

                    <div class="my-4">
                        <label for="is_adminUpdate">Roles</label>
                        <select class="form-select" wire:model.debounce.300ms="is_adminUpdate" id="is_adminUpdate">
                            <option selected>Pilih</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                        @error('is_adminUpdate') <span class="error">{{ $message }}</span> @enderror
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