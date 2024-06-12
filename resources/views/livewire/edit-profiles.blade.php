<div>

    <div class="card">
        <div class="card-content">
            <div class="card-body">



                <div class="form-group my-4">
                    <input type="text" class="form-control" wire:model.debounce.300ms="name">
                </div>


                <div class="form-group my-4">
                    <input type="text" class="form-control" wire:model.debounce.300ms="email">
                </div>

                <div class="form-group my-4">
                    <button class="btn btn-primary" wire:click="submitUserChange">Ubah</button>
                </div>
            </div>
        </div>
    </div>

</div>