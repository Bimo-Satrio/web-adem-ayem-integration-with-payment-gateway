<div wire:ignore.self class="modal fade" id="modalAddWaitingList" data-bs-backdrop="static" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <form wire:submit.prevent="addWaitingList">
                <div class="modal-body">


                    <div class="my-4">
                        <select class="form-select" aria-label="Default select example"class="selectpicker" data-live-search="true" wire:model="userWaitingList">
                            <option selected>Pilih Username</option>
                            @forelse ($users as $user )
                            <option value="{{ $user->id_user }}">{{ $user->username }}</option>

                            @empty
                            <option value="" disabled readonly></option>
                            @endforelse

                          </select>
                    </div>



                    <div class="my-4">

                        @if($userWaitingList == NULL )
                        <input type="text" disabled readonly class="form-control" placeholder="">
                    @else

                         <input type="text" disabled readonly class="form-control" placeholder="{{ $users->find( $userWaitingList)->nama_lengkap }}">
                    @endif
                    </div>


                    <div class="my-4">

                        @if($userWaitingList == NULL )
                        <input type="text" disabled readonly class="form-control" placeholder="">
                    @else

                         <input type="text" disabled readonly class="form-control" placeholder="{{ $users->find( $userWaitingList)->email }}">
                    @endif
                    </div>



                    <div class="my-4">

                        @if($userWaitingList == NULL )
                        <input type="text" disabled readonly class="form-control" placeholder="">
                    @else

                         <input type="text" disabled readonly class="form-control" placeholder="{{ $users->find( $userWaitingList)->no_telefon }}">
                    @endif
                    </div>



                    <div class="my-4">
                        <select class="form-select" aria-label="Default select example"class="selectpicker" data-live-search="true" wire:model="kontrakanWaitingList">
                            <option selected>Pillih Unit Kontrakan</option>
                            @forelse ($unit_kontrakan as $kontrakan )
                            <option value="{{ $kontrakan->id_kontrakan }}">


                                @if($kontrakan->status_huni == 1 and $kontrakan->status_huni == 1)
                            {{ $kontrakan->kontrakan }} Tersedia


                                @elseif ($kontrakan->status_huni < 1 and $kontrakan->status_huni < 1)
                              {{ $kontrakan->kontrakan }} Tidak Tersedia

                                @endif
                            </option>

                            @empty
                            <option value="" disabled readonly></option>
                            @endforelse

                          </select>
                    </div>


                    <div class="my-4">

                        @if($kontrakanWaitingList == NULL )
                        <input type="text" disabled readonly class="form-control" placeholder="">
                    @else

                         <input type="text" disabled readonly class="form-control" placeholder="{{ $unit_kontrakan->find($kontrakanWaitingList)->kontrakan }}">
                    @endif
                    </div>

                    <div class="my-4">

                        @if($kontrakanWaitingList == NULL )
                        <input type="text" disabled readonly class="form-control" placeholder="">
                    @else

                         <input type="text" disabled readonly class="form-control" placeholder="{{ $unit_kontrakan->find($kontrakanWaitingList)->lokasi }}">
                    @endif
                    </div>

                    <div class="my-4">

                        @if($kontrakanWaitingList == NULL )
                        <input type="text" disabled readonly class="form-control" placeholder="">
                    @else

                         <input type="text" disabled readonly class="form-control" placeholder="{{ $unit_kontrakan->find($kontrakanWaitingList)->harga }}">
                    @endif
                    </div>



                    <div class="my-4">


                        <input type="date" class="form-control" wire:model="tanggal_pengajuan">




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


