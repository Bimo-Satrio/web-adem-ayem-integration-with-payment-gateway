<div wire:ignore.self class="modal fade" id="PenghuniModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="PenghuniModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <form wire:submit.prevent="penghuniAdd">
                <div class="modal-body">


                    <div class="mb-2">
                        <label>ID Kontrakan</label>
                        <input type="text" wire:model.debounce.300ms="id_kontrakan" class="form-control @if ($errors->has('id_kontrakan')) is-invalid @elseif ($id_kontrakan == NULL) @else is-valid @endif " readonly>
                        @error('id_kontrakan') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2">
                        <label>Unit Kontrakan</label>
                        <input type="text" wire:model.debounce.300ms="kontrakan" class="form-control @if ($errors->has('kontrakan')) is-invalid @elseif ($kontrakan== NULL) @else is-valid @endif "readonly>


                        @error('kontrakan') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-2">
                        <label>Harga Perbulan (Rp.)</label>
                        <input type="text" wire:model.debounce.300ms="harga_unit_kontrakan" class="form-control @if ($errors->has('harga_unit_kontrakan')) is-invalid @elseif ($harga_unit_kontrakan== NULL) @else is-valid @endif  " readonly>
                        @error('harga_unit_kontrakan') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>




                    <div class="mb-2">
                        <label for="nama_penghuni">Nama Lengkap</label>
                        <select wire:model.debounce.300ms="id_transaksi" class="form-control @if ($errors->has('id_transaksi')) is-invalid @elseif ($id_transaksi == NULL) @else is-valid @endif" id="nama_penghuni" name="nama_penghuni_id">
                            <option value="">Pilih Nama Lengkap</option>
                            @foreach ($getUser as $getUsr)
                            @if($getUsr->status_huni == 1 )
                            <option value="{{ $getUsr->id_transaksi }}" {{ $getUsr->id_transaksi == $id_transaksi ? 'selected' : '' }}>{{ $getUsr->user->name }}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('id_transaksi') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>


                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label>Email</label>
                            @if ($id_transaksi)
                            <input type="text" value="{{ $getUser->find( $id_transaksi)->user->email }}" class="form-control" readonly>
                            @else
                            <input type="text" value="Pilih Penghuni Terlebih Dahulu" class="form-control"readonly>
                            @endif
                        </div>

                        <div class="col-md-6 mb-2">
                            <label>No Telefon</label>
                            @if ($id_transaksi)
                            <input type="text" value="{{ $getUser->find( $id_transaksi)->user->no_telefon }}" class="form-control" readonly>
                            @else
                            <input type="text" value="Pilih Penghuni Terlebih Dahulu" class="form-control"readonly>
                            @endif
                        </div>


                        <div class="col-md-6 mb-2">
                            <label>Tanggal Huni</label>
                            @if ($id_transaksi)
                            <input type="text" value="{{date('d F Y ',strtotime( $getUser->find( $id_transaksi)->tanggal_huni) )}}" class="form-control" readonly>
                            @else
                            <input type="text" value="Pilih Penghuni Terlebih Dahulu" class="form-control " readonly>
                            @endif
                        </div>



                        <div class="col-md-6 mb-2">
                            <label>Lama Huni</label>
                            @if ($id_transaksi)
                            <input type="text" value="{{ $getUser->find( $id_transaksi)->lama_huni_unit_kontrakan }}" class="form-control " readonly >
                            @else
                            <input type="text" value="Pilih Penghuni Terlebih Dahulu" class="form-control " readonly>
                            @endif
                        </div>


                        <div class="col-md-12 mb-2">
                             <label>Tagihan Lama Huni Disesuaikan Dengan Kolom Lama Huni Diatas</label>
                             <select wire:model.debounce.300ms="tagihanhuni" class="form-control " >
                                <option value="">Pilih Tagihan Lama Huni</option>
                            @foreach ($Lama_huni as $lamahuni)
                             <option value="{{ $lamahuni->lama_huni }}">{{ $lamahuni->lama_huni}}</option>
                            @endforeach
                                </select>
                        </div>



                        <div class="col-md-12 mb-2">
                            <label for="jatuh_tempo">Jatuh Tempo Tagihan Lama Huni</label>
                            <input wire:model="jatuh_tempo_tagihan" type="date" class="form-control @if ($errors->has('jatuh_tempo_tagihan')) is-invalid @elseif ($jatuh_tempo_tagihan== NULL) @else is-valid @endif">
                        </div>
                        @error('jatuh_tempo_tagihan') <span class="text-danger error">{{ $message }}</span>

                        @enderror
                    </div>


                    <div class="mb-2">
                        <label for="status_tagihan">Status Pembayaran</label>
                        <select wire:model.debounce.300ms="status_tagihan" class="form-control @if ($errors->has('status_tagihan')) is-invalid @elseif ($status_tagihan== NULL) @else is-valid @endif" id="status_tagihan" name="status_tagihan_id">
                            <option value="">Pilih Status Pembayaran</option>
                            <option value="1" selected>Lunas</option>
                            <option value="0" selected>Belum Lunas</option>
                        </select>
                        @error('status_tagihan') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
