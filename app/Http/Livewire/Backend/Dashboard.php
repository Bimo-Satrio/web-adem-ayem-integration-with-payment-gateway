<?php

namespace App\Http\Livewire\Backend;

use App\Models\User;
use Livewire\Component;
use App\Models\penghuni;
use App\Models\Kontrakan;
use App\Models\PengajuanSewa;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\Else_;

class Dashboard extends Component
{

    //deklarasi objek dari database
    public $kontrakan, $penghuni, $transaksi;

    public $countUser, $countAdmin;

    //hitung total
    public $countKontrakan, $countPenghuni;
    public  $jsonresponse;

    public function mount()
    {


        $apiRequest = Http::get('https://api.quotable.io/random');
        $this->jsonresponse = $apiRequest->json();


        $this->kontrakan = Kontrakan::all();
        $this->countKontrakan = $this->kontrakan->count();


        $this->penghuni = penghuni::all();
        $this->countPenghuni = $this->penghuni->count();


        $this->transaksi = PengajuanSewa::where('status_pengajuan_sewa', 0)->count();

        $this->countUser = User::where('is_admin', 0)->count();

        $this->countAdmin = User::where('is_admin', 2)->count();
    }


    public function render()
    {
        return view('livewire.backend.dashboard', ['jsonresponse' => $this->jsonresponse])
            ->extends('layouts.main')->section('content');
    }
}
