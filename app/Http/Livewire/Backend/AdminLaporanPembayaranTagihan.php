<?php

namespace App\Http\Livewire\Backend;

use App\Models\PengajuanSewa;
use App\Models\Tagihan_penghuni;
use Livewire\Component;

class AdminLaporanPembayaranTagihan extends Component
{

    public $dari, $sampai;
    protected $tagihan_penghuni, $total;


    public function filter()
    {
        $this->tagihan_penghuni = Tagihan_penghuni::with('penghuni')->whereBetween('created_at', [$this->dari, $this->sampai])
            ->where(function ($query) {
                $query->where('status_pembayaran_tagihan', 2);
            })->get();
    }

    public function render()
    {

        return view('livewire.backend.admin-laporan-pembayaran-tagihan', ['tagihan_penghuni' => $this->tagihan_penghuni, 'total' => $this->total])->extends('layouts.main')->section('content');
    }
}
