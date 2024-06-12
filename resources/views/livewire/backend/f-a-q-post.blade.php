<div class="container-fluid">
    <div class="container">
        <form wire:submit.prevent="faqPost">
            <div class="card">
                <div class="card-body">
                    <div class="my-4">
                        <div class="form-group">

                            <input type="text" class="form-control  @if($errors->has('judul_faq')) is-invalid @elseif($judul_faq == NULL)  @else is-valid @endif" id="judul_faq" placeholder="Judul FAQ" wire:model.debounce.300ms="judul_faq" />

                            @error('judul_faq') <span class="error">{{ $message }}</span> @enderror
                        </div>

                    </div>


                    <div class="my-4">
                        <div Wire:ignore>
                            <div class="form-group">

                                <textarea placeholder="Deskripsi FAQ" name="description" id="summernote" class="form-control @if($errors->has('isi_faq')) is-invalid @elseif($isi_faq == NULL)  @else is-valid @endif" wire:model.debounce.300ms="isi_faq"></textarea>
                                @error('isi_faq') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>

        </form>
    </div>


</div>


<script>
    document.addEventListener('livewire:load', () => {
        $('#summernote').summernote({
            placeholder: 'Deskripsi FAQ',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onChange: (contents, $editable) => {
                    @this.set('isi_faq', contents);
                }
            }
        });
    });
</script>