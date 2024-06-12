<?php

namespace App\Http\Livewire\Backend;

use App\Models\PengajuanSewa;
use Livewire\Component;

class AdminLaporanPembayaranPengajuan extends Component
{
    public $dari, $sampai;
    protected  $pengajuan_sewa, $total;


    public function filter()
    {
        $this->pengajuan_sewa = PengajuanSewa::whereBetween('created_at', [$this->dari, $this->sampai])
            ->where(function ($query) {
                $query->where('status_pengajuan_sewa', 3);
            })
            ->where(function ($query) {
                $query->where('status_identitas', 2);
            })
            ->get();
    }

    public function render()
    {

        return view('livewire.backend.admin-laporan-pembayaran-pengajuan', ['pengajuan_sewa' => $this->pengajuan_sewa, 'total' => $this->total])->extends('layouts.main')->section('content');
    }
}
