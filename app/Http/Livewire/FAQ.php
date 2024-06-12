<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FAQModel;

class FAQ extends Component
{


    public function render()
    {

        $getFAQ = FAQModel::all();
        return view('livewire.f-a-q', compact('getFAQ'))->extends('layouts.apps')->section('content');
    }
}
