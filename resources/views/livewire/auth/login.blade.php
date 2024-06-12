@section ('title')
Login
@endsection

<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1 >Kontrakan Adem Ayem </h1>
                <h1 >Login</h1>


                <form wire:submit.prevent="login">
                  <h5>Username</h5>
                    <div class="form-group ">

                        <input type="text" class="form-control form-control-xl @if($errors->has('username')) is-invalid @elseif($username == NULL)  @else is-valid @endif"  wire:model.debouce.500ms="username" required />

                        @error('username') <span class="error">{{$message}}</span> @enderror
                    </div>
                    <h5>Password</h5>
                    <div class="form-group ">

                        <input type="password" class="form-control form-control-xl @if($errors->has('password')) is-invalid @elseif($password == NULL)  @else is-valid @endif" wire:model.debouce.500ms="password" required />

                        @error('password') <span class="error">{{$message}}</span> @enderror
                    </div>
                    <div class="form-check form-check-lg d-flex align-items-end">
                        <input wire:model.debounce.500ms="remember" class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault" />
                        <label class="form-check-label text-gray-600" for="flexCheckDefault">
                            Remember Me
                        </label>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                        Login
                    </button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">
                        Belum Memiliki Akun ?
                        <a href="{{ route('register') }}" class="font-bold">Register Sekarang</a>
                    </p>
                    <p>
                        @if (Route::has('password.request'))
                        <a class="font-bold" href="{{ route('password.request') }}">Lupa Password ?</a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>
</div>
