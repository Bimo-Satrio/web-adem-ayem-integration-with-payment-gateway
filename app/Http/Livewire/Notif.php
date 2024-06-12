<?php

namespace App\Http\Livewire;

use App\Models\PengajuanSewa;
use Livewire\Component;
use App\Models\Transaksi;

class Notif extends Component
{

    public $count;


    public function mount()
    {
        $this->count = PengajuanSewa::where('status_pengajuan_sewa', 0)->count();
    }


    public function render()
    {
        return view('livewire.notif');
    }
}
