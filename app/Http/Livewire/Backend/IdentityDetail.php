<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class IdentityDetail extends Component
{

    public function mount($id_transaksi)
    {
        $identity = DB::table('identitas')
            ->join('transaksi', 'transaksi.id_transaksi', '=', 'identitas.id_transaksi')
            ->join('users', 'users.id', '=', 'transaksi.id_user')
            ->join('lama_huni', 'lama_huni.id_lama_huni', '=', 'transaksi.id_lama_huni')
            ->join('kontrakan', 'kontrakan.id_kontrakan', '=', 'transaksi.id_kontrakan')
            ->where('transaksi.id_transaksi', $id_transaksi)->first();

        $this->id_kontrakan = $identity->id_kontrakan;
        $this->name = $identity->name;
        $this->kontrakan = $identity->kontrakan;
        $this->created_at = $identity->created_at;
        $this->tanggal_huni = $identity->tanggal_huni;
    }





    public function render()
    {
        return view('livewire.backend.identity-detail')
            ->extends('layouts.main')->section('content');;
    }
}
