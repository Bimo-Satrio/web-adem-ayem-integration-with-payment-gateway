<?php

use App\Http\Livewire\FAQ;
use App\Http\Livewire\Home;

//laravel controller
//payment gateway
use App\Http\Livewire\Nota;
//laravel controller

//user
use App\Http\Livewire\Rent;
use FontLib\Table\Type\name;
use App\Http\Livewire\Receipt;
use App\Http\Livewire\Tentang;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\SinglePost;
use App\Http\Livewire\AdminProcess;
use App\Http\Livewire\EditProfiles;
use App\Http\Livewire\UserProfiles;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
//akhir user

//admin
use App\Http\Livewire\Backend\FAQList;
use App\Http\Livewire\Backend\FAQPost;
use App\Http\Livewire\Backend\Profile;
use App\Http\Livewire\UploadIdentitas;
use App\Http\Livewire\Backend\Carousel;
use App\Http\Livewire\RiwayatPengajuan;
use App\Http\Livewire\Backend\Dashboard;
use App\Http\Livewire\Backend\AccountList;
use App\Http\Livewire\Backend\CarouselAdd;
use App\Http\Livewire\Backend\WaitingList;
use App\Http\Livewire\Backend\DataLamaHuni;
use App\Http\Controllers\MidtransController;
use App\Http\Livewire\Backend\AdminLaporanPembayaranPengajuan;
use App\Http\Livewire\Backend\AdminLaporanPembayaranTagihan;
use App\Http\Livewire\Backend\AdminPilihLaporan;
use App\Http\Livewire\Backend\Editkontrakan;
use App\Http\Livewire\Backend\Postkontrakan;
use App\Http\Livewire\Backend\Unitkontrakan;
use App\Http\Livewire\Backend\Viewkontrakan;
use App\Http\Livewire\Backend\IdentityDetail;
use App\Http\Livewire\Pemilik\ProfilePemilik;
use App\Http\Livewire\Backend\IdentityValidate;
use App\Http\Livewire\Backend\PenghuniKontrakan;
use App\Http\Livewire\BuktiPembayaran;
use App\Http\Livewire\BuktiPembayaranPDF;
use App\Http\Livewire\NotaPDF;

//akhir admin



//pemilik
use App\Http\Livewire\Pemilik\LaporanPemilikUnit;
use App\Http\Livewire\Pemilik\LaporanPemilikTagihan;
use App\Http\Livewire\Pemilik\LaporanPemilikWaiting;
use App\Http\Livewire\Pemilik\LaporanPemilikPengajuan;
//akhir admin

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//midleware
//kode ini akan memperbolehkan custom login sama register kecuali verifikasi email sama forgot password
Auth::routes(['login' => false, 'register' => false, 'verify' => true, 'forgot' => true]);

//dibawah ini merupakan custom login yang merupakan hasil kode diatas
//auth (login,register)
Route::get('/auth/login', Login::class)->name('login');
Route::get('/auth/register', Register::class)->name('register');
//end auth

//livewire component

//user


Route::middleware(['web'])->group(function () {
    Route::get('/', Home::class)->name('home');
    Route::get('user-profiles', UserProfiles::class)->name('user-profiles');
    Route::get('edit-profiles', EditProfiles::class)->name('edit-profiles');
    Route::get('single-post/{id_kontrakan}', SinglePost::class)->name('single-post');
    Route::get('rent', Rent::class)->name('rent');
    Route::get('upload-identitas/{id_pengajuan_sewa}', UploadIdentitas::class)->name('upload-identitas');
    Route::get('riwayat-pengajuan', RiwayatPengajuan::class)->name('riwayat-pengajuan');
    Route::get('admin-process', AdminProcess::class)->name('admin-process');

    //laravel controller
    //payment gateway
    Route::get('/payments/{id_pengajuan_sewa}', [MidtransController::class, 'payments'])->name('payments');
    Route::get('/paymentsTagihan/{id_tagihan_penghuni}', [MidtransController::class, 'PaymentsTagihan'])->name('paymentsTagihan');
    //end payment gateway
    //laravel controller diluar dari ini berati makenya component dari livewire

    Route::get('handling-user-payments/{id_tagihan_penghuni}', \App\Http\Livewire\HandlingUserPayments::class);
    Route::get('bukti-pembayaran/{id_pengajuan_sewa}', BuktiPembayaran::class)->name('bukti-pembayaran');
    Route::get('f-a-q', FAQ::class)->name('f-a-q');

    Route::get('tentang', Tentang::class)->name('tentang');

    Route::get('nota/{id_pengajuan_sewa}', Nota::class)->name('nota');


    Route::get('nota-p-d-f/{id_pengajuan_sewa}', [NotaPDF::class, 'download_nota'])->name('nota-p-d-f');


    Route::get('bukti-pembayaran-p-d-f/{id_pengajuan_sewa}', [BuktiPembayaranPDF::class, 'download_bukti_pembayaran'])->name('bukti-pembayaran-p-d-f');
});

//end user


//pemilik
Route::middleware(['auth', 'web', 'is_pemilik', 'verified'])->group(function () {

    Route::get('pemilik/laporan-pemilik-unit',  LaporanPemilikUnit::class)->name('laporan-pemilik-unit');
    Route::get('pemilik/laporan-pemilik-tagihan',  LaporanPemilikTagihan::class)->name('laporan-pemilik-tagihan');
    Route::get('pemilik/laporan-pemilik-waiting',  LaporanPemilikWaiting::class)->name('laporan-pemilik-waiting');
    Route::get('pemilik/laporan-pemilik-pengajuan',  LaporanPemilikPengajuan::class)->name('laporan-pemilik-pengajuan');
    Route::get('pemilik/profile-pemilik', ProfilePemilik::class)->name('profile-pemilik');
});



//end pemilik



//admin
Route::middleware(['auth', 'web', 'is_admin', 'verified'])->group(function () {
    Route::get('backend/dashboard', Dashboard::class)->name('dashboard');
    Route::get('backend/account-list', AccountList::class)->name('account-list');
    Route::get('backend/unitkontrakan', Unitkontrakan::class)->name('unitkontrakan');
    Route::get('backend/penghuni-kontrakan', PenghuniKontrakan::class)->name('penghuni-kontrakan');
    Route::get('backend/identity-validate', IdentityValidate::class)->name('identity-validate');
    Route::get('backend/postkontrakan', Postkontrakan::class)->name('postkontrakan');
    Route::get('backend/viewkontrakan/{id_kontrakan}', Viewkontrakan::class)->name('viewkontrakan');
    Route::get('backend/editkontrakan/{id_kontrakan}', Editkontrakan::class)->name('editkontrakan');
    Route::get('backend/identity-detail/{id_pengajuan_sewa}', IdentityDetail::class)->name('identity-detail');
    Route::get('backend/carousel', Carousel::class)->name('carousel');
    Route::get('backend/carousel-add', CarouselAdd::class)->name('carousel-add');
    Route::get('backend/f-a-q-list', FAQList::class)->name('f-a-q-list');
    Route::get('backend/f-a-q-post', FAQPost::class)->name('f-a-q-post');
    Route::get('backend/data-lama-huni', DataLamaHuni::class)->name('data-lama-huni');
    Route::get('backend/waiting-list', WaitingList::class)->name('waiting-list');
    Route::get('backend/profile', Profile::class)->name('profile');


    Route::get('backend/admin-pilih-laporan', AdminPilihLaporan::class)->name('admin-pillih-laporan');


    Route::get('backend/admin-laporan-pembayaran-pengajuan', AdminLaporanPembayaranPengajuan::class)->name('admin-laporan-pembayaran-pengajuan');
    Route::get('backend/admin-laporan-pembayaran-tagihan', AdminLaporanPembayaranTagihan::class)->name('admin-laporan-pembayaran-tagihan');
});
//end admin
