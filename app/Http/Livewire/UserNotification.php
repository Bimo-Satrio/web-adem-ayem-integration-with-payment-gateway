<?php

namespace App\Http\Livewire;

use App\Models\PengajuanSewa;
use Livewire\Component;

class UserNotification extends Component
{

    public $pengajuan_sewa, $count;


    public function mount()
    {
        $this->pengajuan_sewa = PengajuanSewa::where('status_pengajuan_sewa', 0)->count();
    }

    public function render()
    {
        return view('livewire.user-notification');
    }
}
