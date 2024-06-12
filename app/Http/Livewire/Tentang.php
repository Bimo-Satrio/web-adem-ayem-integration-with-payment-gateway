<?php

namespace App\Http\Livewire;

use App\Models\TentangModel;
use Livewire\Component;

class Tentang extends Component
{
    public function render()
    {

        $tentangAdemAyem = TentangModel::all();

        return view('livewire.tentang', compact("tentangAdemAyem"))->extends("layouts.apps")->section('content');
    }
}
