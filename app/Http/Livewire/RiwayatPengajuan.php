<?php

namespace App\Http\Livewire;

use App\Models\Identitas;
use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class RiwayatPengajuan extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        if (Auth::user()) {
            if (Auth::user()->id_user) {
                $pengajuan = Identitas::join('pengajuan_sewa', 'identitas.id_pengajuan_sewa', '=', 'pengajuan_sewa.id_pengajuan_sewa')->where('pengajuan_sewa.id_user', Auth::user()->id_user)->orderBy('created_at', 'desc')->paginate(10);
            } else {
                return \redirect()->route('/');
            }
        } else {
            return redirect()->route('/');
        }
        return view('livewire.riwayat-pengajuan', \compact('pengajuan'))
            ->extends('layouts.apps')->section('content');
    }
}
