<div wire:ignore.self class="modal fade" id="crateTagihanPenghuni" data-bs-backdrop="static" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form wire:submit.prevent="newTagihanPenghuni">
                <div class="modal-body">
                    <div class="mb-4">
                        <label for="lama_huni" class="mb-2">Lama Huni</label>
                        <select wire:model="lamaHuniSelected" class="form-control" id="lama_huni" name="id_lama_huni" required>

                            @foreach ($lama_huni as $ln)
                            <option value="{{ $ln->lama_huni }}">{{ $ln->lama_huni }}</option>
                            @endforeach

                        </select>
                        @error('lamaHuniSelected') <span class="error">{{ $message }}</span> @enderror

                    </div>


                    <div class="mb-4">
                        <label for="jatuh_tempo">Jatuh Tempo Tagihan</label>
                        <input wire:model="jatuh_tempo_tagihan" type="date" class="form-control">
                    </div>


                </div>
                <div class="modal-footer">
                    <button  class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Tutup</button>
                    <button  class="btn btn-primary">Buat Tagihan</button>
                </div>
            </form>
        </div>
    </div>
</div>
