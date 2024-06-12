<?php

namespace App\Http\Livewire\Backend;

use App\Models\User;
use Livewire\Component;
use App\Models\Transaksi;
use App\Models\PengajuanSewa;

class Notification extends Component
{

    public $PengajuanSewa;
    public $statusPengajuanSewa, $countTransaksi, $profilecheck, $getPengajuanSewa;


    public function mount()
    {
        $this->PengajuanSewa = PengajuanSewa::where('status_pengajuan_sewa', 1)->count();

        $this->getPengajuanSewa = PengajuanSewa::where('status_pengajuan_sewa', 1)->orderBy('updated_at')->take(10)->get();
    }

    public function render()
    {
        return view(
            'livewire.backend.notification',
            ['getPengajuanSewa' => $this->getPengajuanSewa],

        );
    }
}
