<?php

namespace App\Http\Livewire\Pemilik;

use App\Models\WaitingListModel;
use Livewire\Component;
use Livewire\WithPagination;

class LaporanPemilikWaiting extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $laporan_waiting_list = WaitingListModel::with('user', 'kontrakan')->orderBy('updated_at', 'desc')->paginate(10);
        return view('livewire.pemilik.laporan-pemilik-waiting', \compact('laporan_waiting_list'))->extends('layouts.owner')->section('content');
    }
}
