<div wire:ignore.self class="modal fade" id="identifyModalVal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <form wire:submit.prevent="updateVal">
                <div class="modal-body">
                    <div class="my-4">
                        <h5>KTP</h5>
                        <img src="{{$imagePath}}" class="rounded" height="600px" width="600px" id="ktp">
                    </div>

                    <div class="my-4"></div>
                    <select class="form-select" wire:model="selectedData">
                        <option selected>Pilih</option>
                        <option value="1">Terima</option>
                        <option value="2">Tolak</option>
                    </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Proses</button>


                </div>
            </form>
        </div>
    </div>
</div>