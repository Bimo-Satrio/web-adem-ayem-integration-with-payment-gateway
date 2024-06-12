@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi Email Anda') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Verifikasi Email Telah Dikirim Ulang Silahkan Check Email Anda') }}
                    </div>
                    @endif

                    {{ __('Sebelum Melanjutkan, Silahkan Check Email Anda Terlebih Dahulu ') }}
                   <br>
                    {{ __('Jika Anda Tidak Mendapatkan Email Verifikasi Silahkan Klik Tulisan Dibawah Ini') }},
                   <br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Kirim Ulang Verifikasi Email') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
