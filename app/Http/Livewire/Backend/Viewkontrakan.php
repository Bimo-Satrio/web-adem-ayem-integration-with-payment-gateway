<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Kontrakan;
use App\Models\FotoKontrakan;

class Viewkontrakan extends Component
{
    public $lat, $long;
    public $id_kontrakan, $kontrakan, $deskripsi, $lokasi, $harga, $stok;

    public function mount(int $id_kontrakan)
    {
        $kontrakan = Kontrakan::where('id_kontrakan', $id_kontrakan)->first();

        $this->id_kontrakan = $kontrakan->id_kontrakan;
        $this->kontrakan = $kontrakan->kontrakan;
        $this->long = $kontrakan->long;
        $this->lat = $kontrakan->lat;
        $this->deskripsi = $kontrakan->deskripsi;
        $this->lokasi = $kontrakan->lokasi;
        $this->harga = $kontrakan->harga;
        $this->stok = $kontrakan->stok;
    }


    public function render()
    {

        $FotoKontrakan = FotoKontrakan::where('id_kontrakan', $this->id_kontrakan)->get();
        return view('livewire.backend.viewkontrakan', compact('FotoKontrakan'))
            ->extends('layouts.main')->section('content');
    }
}
