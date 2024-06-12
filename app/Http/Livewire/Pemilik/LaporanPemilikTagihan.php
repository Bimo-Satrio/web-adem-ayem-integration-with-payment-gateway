<?php

namespace App\Http\Livewire\Pemilik;

use Carbon\Carbon;
use App\Models\User;
use Livewire\Component;
use App\Models\penghuni;
use Livewire\WithPagination;

class LaporanPemilikTagihan extends Component
{
    public $status_Tagihan = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';



    public function render()
    {


        $tagihan_penghuni = penghuni::with('pengajuansewa')->where('status_pembayaran_tagihan', 'like', $this->status_Tagihan)->paginate(6);
        $days = Carbon::now()->addDays(3);
        $admin = User::where('is_admin', 2)->first();
        return view('livewire.pemilik.laporan-pemilik-tagihan', \compact('days', 'tagihan_penghuni', 'admin'))->extends('layouts.owner')->section('content');
    }
}
