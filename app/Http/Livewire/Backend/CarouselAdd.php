<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\CarouselModel;
use Livewire\WithFileUploads;

class CarouselAdd extends Component
{


    use WithFileUploads;

    public $foto_carousel, $carouselFileUpload;

    protected $rules = [
        'foto_carousel' => 'required|max:1024',

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function carouselUpload()
    {

        $this->validate();

        if ($this->foto_carousel != '') {
            foreach ($this->foto_carousel as $file) {
                $pimage = new CarouselModel();
                $pimage->id_carousel = Str::uuid();
                $this->carouselFileUpload =  $file->store('carousel');
                $pimage->foto_carousel = $this->carouselFileUpload;
                $pimage->save();
            }
        }

        $this->dispatchBrowserEvent('carouselUploadSuccess');
    }


    public function deleteCarousel(int $id_carousel)
    {
        $image = CarouselModel::where('id_carousel', $id_carousel)->first();
        $image->delete();
    }

    public function render()
    {
        $getCarousel = CarouselModel::all();

        return view('livewire.backend.carousel-add', compact('getCarousel'))->extends('layouts.main')->section('content');
    }
}
