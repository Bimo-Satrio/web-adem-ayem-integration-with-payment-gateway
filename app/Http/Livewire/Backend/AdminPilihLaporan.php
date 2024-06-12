<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class AdminPilihLaporan extends Component
{



    public function render()
    {
        return view('livewire.backend.admin-pilih-laporan')->extends('layouts.main')->section('content');
    }
}
