<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\CarouselModel;

class Carousel extends Component
{





    public function render()
    {


        $getCarousel = CarouselModel::all();

        return view('livewire.backend.carousel', compact('getCarousel'))
            ->extends('layouts.main')
            ->section('content');
    }
}
