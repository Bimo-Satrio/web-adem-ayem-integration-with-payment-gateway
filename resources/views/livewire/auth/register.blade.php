@section('title')
Daftar
@endsection


<div id="auth">

    <div class="row h-100">

        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1>Kontrakan Adem Ayem</h1>
                <h1>Register</h1>


                <form wire:submit.prevent="createAccount">

                    <h5>Username</h5>
                    <div class="form-group">

                        <input type="text" class="form-control form-control-xl  @if($errors->has('username')) is-invalid @elseif($username == NULL)  @else is-valid @endif  "  wire:model.debounce.500ms="username" />

                        @error('username') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <h5>Nama Lengkap</h5>
                    <div class="form-group">

                        <input type="text" class="form-control form-control-xl  @if($errors->has('nama_lengkap')) is-invalid @elseif($nama_lengkap == NULL)  @else is-valid @endif  "  wire:model.debounce.500ms="nama_lengkap" />

                        @error('nama_lengkap') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <h5>Email</h5>
                    <div class="form-group">

                        <input type="text" class="form-control form-control-xl @if($errors->has('email')) is-invalid @elseif($email == NULL)  @else is-valid @endif"  wire:model.debounce.500ms="email" />

                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>


<h5>Nomor Telefon</h5>
                    <div class="form-group">

                        <input type="text" class="form-control form-control-xl  @if($errors->has('nomor_telefon')) is-invalid @elseif($nomor_telefon == NULL)  @else is-valid @endif  "  wire:model.debounce.500ms="nomor_telefon" />

                        @error('nomor_telefon') <span class="error">{{ $message }}</span> @enderror
                    </div>




                    <h5>Password</h5>
                    <div class="form-group">

                        <input type="password" class="form-control form-control-xl  @if($errors->has('password')) is-invalid @elseif($password == NULL)  @else is-valid @endif  "  wire:model.debounce.500ms="password" />

                        @error('password') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <h5>Konfirmasi Password</h5>
                    <div class="form-group">

                        <input type="password" class="form-control form-control-xl  @if($errors->has('konfirmasi_password')) is-invalid @elseif($konfirmasi_password == NULL)  @else is-valid @endif  "  wire:model.debounce.500ms="konfirmasi_password" />

                        @error('konfirmasi_password') <span class="error">{{ $message }}</span> @enderror
                    </div>




                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                        Register
                    </button>

                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">
                        Sudah Memiliki Akun ?
                        <a href="{{ route('login') }}" class="font-bold">Login Sekarang</a>.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>


</div>
