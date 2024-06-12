<?php

namespace App\Http\Livewire\Backend;

use Error;
use Exception;
use Livewire\Component;
use App\Models\Kontrakan;
use Illuminate\Support\Str;
use App\Models\FotoKontrakan;
use Livewire\WithFileUploads;

class Editkontrakan extends Component
{
    use WithFileUploads;

    public $kontrakan, $deskripsi, $lokasi, $harga, $status_huni, $status_ketersediaan, $longitude, $latitude;
    public $images = [];
    public $id_kontrakan;

    public function mount($id_kontrakan)
    {
        try {
            $kontrakan = Kontrakan::findOrFail($id_kontrakan);
            $this->id_kontrakan = $kontrakan->id_kontrakan;
            $this->kontrakan = $kontrakan->kontrakan;
            $this->deskripsi = $kontrakan->deskripsi;
            $this->longitude = NULL;
            $this->latitude = NULL;
            $this->lokasi = $kontrakan->lokasi;
            $this->harga = $kontrakan->harga;
            $this->status_ketersediaan = $kontrakan->status_ketersediaan;
            $this->status_huni = $kontrakan->status_huni;
        } catch (Exception $e) {
            return redirect()->route('unitkontrakan');
        }
    }





    protected $rules = [

        'kontrakan' => 'required| string | min:1 |max:25',

        'deskripsi' => 'required|string |min : 1',
        'harga' =>  'required | integer | min:1 |max:99999999999',
        'status_ketersediaan' => 'required',
        'status_huni' => 'required'

    ];

    public function updated($propertName)
    {
        $this->validateOnly($propertName);
    }


    public function updatedImages()
    {
        $this->validate([
            'images' => 'required | mimes:png,jpg,jpeg',
        ]);
    }

    public function editStore()
    {
        $this->validate();

        try {
            $kontrakan = Kontrakan::findOrFail($this->id_kontrakan);
            $kontrakan->kontrakan = $this->kontrakan;
            $kontrakan->deskripsi = $this->deskripsi;
            $kontrakan->longitude = NULL;
            $kontrakan->latitude = NULL;
            $kontrakan->harga = $this->harga;
            $kontrakan->status_ketersediaan = $this->status_ketersediaan;
            $kontrakan->status_huni = $this->status_huni;
            $kontrakan->save();

            if ($this->images != NULL) {
                foreach ($this->images as $image) {
                    $pimage = new FotoKontrakan();
                    $pimage->id_foto_kontrakan = Str::uuid();
                    $pimage->id_kontrakan  = $kontrakan->id_kontrakan;
                    $pimage->foto_kontrakan = $image->store('fotokontrakan');
                    $pimage->save();
                }
            }

            $this->dispatchBrowserEvent('edit-sucess');
        } catch (Error $e) {
            abort(500);
        }
    }





    public function deletefoto($id_foto_kontrakan)
    {
        try {
            $image = FotoKontrakan::findOrFail($id_foto_kontrakan);
            $image->delete();
        } catch (Exception $e) {
            abort(500);
        }
    }

    public function render()
    {
        $FotoKontrakan = FotoKontrakan::where('id_kontrakan', $this->id_kontrakan)->get();
        return view('livewire.backend.editkontrakan', compact('FotoKontrakan'))
            ->extends('layouts.main')->section('content');
    }
}
