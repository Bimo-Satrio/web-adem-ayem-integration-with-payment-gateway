<?php

namespace App\Http\Livewire\Pemilik;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\PengajuanSewa;

class LaporanPemilikPengajuan extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';
    protected $queryString = ['search'];
    public function render()
    {
        $search = '%' . $this->search . '%';
        $pengajuan_sewa = PengajuanSewa::where('id_pengajuan_sewa', 'like', $search)->paginate(6);
        $admin = User::where('is_admin', 2)->first();


        return view('livewire.pemilik.laporan-pemilik-pengajuan', compact('admin', 'pengajuan_sewa'))->extends('layouts.owner')->section('content');
    }
}
