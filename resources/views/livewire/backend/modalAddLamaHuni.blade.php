<div wire:ignore.self class="modal fade" id="modalAddLamaHuni" data-bs-backdrop="static" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <form wire:submit.prevent="lamaHuniAdd">
                <div class="modal-body">


                    <div class="my-4">
                        <div class="form-group">
                            <label for="lama_huni">Lama Huni</label>
                            <input type="text" class="form-control  @if($errors->has('lama_huni')) is-invalid @elseif($lama_huni == NULL)  @else is-valid @endif" id="lama_huni" placeholder="Ketik Lama Huni" wire:model.debounce.300ms="lama_huni" />

                            @error('lama_huni') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>

                    <div class="my-4">
                        <div class="form-group">
                            <label for="inputBulan">Bulan</label>
                            <input type="text" class="form-control  @if($errors->has('inputBulan')) is-invalid @elseif($inputBulan == NULL)  @else is-valid @endif" id="inputBulan" placeholder="12" wire:model.debounce.300ms="inputBulan" />
                            @error('inputBulan') <span class="error">{{ $message }}</span> @enderror
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