<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kontrakan Adem Ayem</title>
    <link rel="stylesheet" href="{{asset('Mazer')}}/assets/css/main/app.css" />
    <link rel="stylesheet" href="{{asset('Mazer')}}/assets/css/pages/auth.css" />
    <link rel="shortcut icon" href="{{asset('Mazer')}}/assets/images/logo/favicon.svg" type="image/x-icon" />
    <link rel="shortcut icon" href="{{asset('Mazer')}}/assets/images/logo/favicon.png" type="image/png" />
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="/"><img src="{{asset('Mazer')}}/assets/images/logo/logo.svg" alt="Logo" /></a>
                    </div>
                    <h1 class="auth-title">Daftarkan Akun</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input class="form-control form-control-xl" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Username" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror



                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input class="form-control form-control-xl" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email@example.com" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="form-group position-relative has-icon-left mb-4">

                            <input class="form-control form-control-xl" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" />

                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>




                        <div class="form-group position-relative has-icon-left mb-4">

                            <input class="form-control form-control-xl" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">

                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>


                        </div>


                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            {{ __('Daftar') }}
                        </button>

                        <div class="text-center mt-5">
                            <p class="text-gray-600">
                                Sudah Memiliki Akun ?
                                <a href="{{ route('login') }}">Login Sekarang</a>.
                            </p>
                            <p>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Lupa Password ?') }}
                                </a>.
                                @endif
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>
</body>

</html>