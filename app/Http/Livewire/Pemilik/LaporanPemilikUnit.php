<?php

namespace App\Http\Livewire\Pemilik;


use Livewire\Component;
use App\Models\Kontrakan;
use Livewire\WithPagination;

class LaporanPemilikUnit extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';



    public function render()
    {



        $unit_kontrakan = Kontrakan::paginate(6);

        return view('livewire.pemilik.laporan-pemilik-unit', \compact('unit_kontrakan'))->extends('layouts.owner')->section('content');
    }
}
