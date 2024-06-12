<div wire:ignore.self class="modal fade" id="modalLamaHuniEdit" data-bs-backdrop="static" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <form wire:submit.prevent="lamahuniEdit">
                <div class="modal-body">


                    <div class="my-4">
                        <div class="form-group">
                            <label for="lamaHuniEdit">Lama Huni</label>
                            <input type="text" class="form-control  @if($errors->has('lamaHuniEdit')) is-invalid @elseif($lamaHuniEdit == NULL)  @else is-valid @endif" id="lamaHuniEdit" placeholder="Ketik Lama Huni" wire:model.debounce.300ms="lamaHuniEdit" />

                            @error('lamaHuniEdit') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <div class="my-4">
                        <div class="form-group">
                            <label for="inputBulanEdit">Bulan</label>
                            <input type="text" class="form-control  @if($errors->has('inputBulanEdit')) is-invalid @elseif($inputBulanEdit == NULL)  @else is-valid @endif" id="inputBulanEdit" placeholder="12" wire:model.debounce.300ms="inputBulanEdit" />
                            @error('inputBulanEdit') <span class="error">{{ $message }}</span> @enderror
                        </div>
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