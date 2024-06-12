<?php

namespace App\Http\Livewire\Backend;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Kontrakan;
use Illuminate\Support\Str;
use App\Models\FotoKontrakan;
use Livewire\WithFileUploads;

class Postkontrakan extends Component
{


    use WithFileUploads;
    public $kontrakan, $deskripsi, $harga, $status_ketersediaan, $status_huni, $long, $lat;
    public $images = [];





    protected $rules = [

        'kontrakan' => 'required| string |min:1|max:25 | unique:kontrakan',
        'images' => 'required|image|mimes:png,jpg,jpeg',
        'deskripsi' => 'required|string |min : 1',
        'harga' =>  'required | integer | min:1 |max:99999999999',
        'status_ketersediaan' => 'required',
        'status_huni' => 'required'

    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function store()
    {


        $this->validate();





        $kontrakan = new Kontrakan();
        $kontrakan->id_kontrakan = Str::uuid();
        $kontrakan->kontrakan = $this->kontrakan;
        $kontrakan->deskripsi = $this->deskripsi;
        $kontrakan->longitude = $this->long;
        $kontrakan->latitude = $this->lat;
        $kontrakan->harga = $this->harga;
        $kontrakan->status_ketersediaan = $this->status_ketersediaan;
        $kontrakan->status_huni = $this->status_huni;
        $kontrakan->save();

        foreach ($this->images as $image) {
            $pimage = new FotoKontrakan();
            $pimage->id_foto_kontrakan = Str::uuid();
            $pimage->id_kontrakan  = $kontrakan->id_kontrakan;
            $pimage->foto_kontrakan = $image->store('fotokontrakan');
            $pimage->save();
        }

        $this->dispatchBrowserEvent('storepostkontrakan');
    }
    public function render()
    {
        return view('livewire.backend.postkontrakan')
            ->extends('layouts.main')->section('content');
    }
}
