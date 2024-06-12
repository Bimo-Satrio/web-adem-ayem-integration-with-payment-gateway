<?php

namespace App\Http\Livewire\Backend;


use Livewire\Component;
use App\Models\Lama_huni;
use Illuminate\Support\Str;

class DataLamaHuni extends Component
{

    public $search;
    protected $paginationTheme = 'bootstrap';

    public $lama_huni, $inputBulan;
    public $lamaHuniEdit, $inputBulanEdit, $getID;
    public $delete_id;
    protected $listeners = ['destroyLamaHuniConfirm' => 'destroyLamaHuni'];
    // jadi maksud dari kode diatas merupakan, kita tangkap dulu fungsi mana yang akan mau di eksekusi terlebih dahulu
    // kemudian fungsi tersbut akan diturunkan ke fungsi berikutnya, ini yang dinamakan event listeners laravel




    // validasi livewire

    protected $rules = [
        'lama_huni' => ['required', 'string', 'min:1', 'max:8', 'unique:lama_huni', 'regex:/^\d* bulan/i'],
        'inputBulan' => ['required', 'integer', 'min:1'],

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    // akhir validasi livewire


    // fungsi nambah

    public function lamaHuniAdd()
    {
        $validatedData = $this->validate();

        $lamaHuniAdd = ([
            'id_lama_huni' => Str::uuid(),
            'lama_huni' => $validatedData['lama_huni'],
            'bulan' => $validatedData['inputBulan'],
        ]);

        Lama_huni::create($lamaHuniAdd);
        $this->resetInput();
        $this->dispatchBrowserEvent('lamaHuniAddSuccess');
    }

    // akhir fungsi nambah


    //tangkep id terlebih dahulu
    public function getID($id_lama_huni)
    {

        $this->getID =  Lama_huni::where('id_lama_huni', $id_lama_huni)->first();

        $this->lamaHuniEdit = $this->getID->lama_huni;
        $this->inputBulanEdit = $this->getID->bulan;
    }
    //akhir tangkep id


    // fungsi buat edit
    public function lamahuniEdit()
    {
        $validatedData = $this->validate([
            'lamaHuniEdit'  => ['required', 'string', 'min:1', 'max:12', 'unique:lama_huni', 'regex:/^\d* bulan/i'],
            'inputBulanEdit' => ['required', 'integer', 'min:1'],

        ]);

        $getLamaHuni = Lama_huni::find($this->getID);
        $getLamaHuni->lama_huni = $validatedData['lamaHuniEdit'];
        $getLamaHuni->bulan = $validatedData['inputBulanEdit'];
        $getLamaHuni->update();
        $this->resetInput();
        $this->dispatchBrowserEvent('lamaHuniEdit');
    }
    //ahir fungsi edit

    // seperti biasa tangkep id dulu dan kalau melakukan delete buatkan event listener dari laravel
    public function destroyLamaHuniConfirm($id_lama_huni)
    {
        //deklarasikan variabel yang akan menampung id, ini berfungsi untuk diturunkan ke fungsi berikutnya
        $this->delete_id = $id_lama_huni;
        //berikutnya lakukan konfirmasi
        $this->dispatchBrowserEvent('destroyLamaHuniConfirmation');
    }


    //kemudian fungsi diatas  diturunkan dibawah penamaan variabel harus sama seperti yang dideklrasaikan diatas
    public function destroyLamaHuni()
    {
        //sampai pada sini maka delete akan terseksekusi
        $getLamaHuniDestroy = Lama_huni::where('id_lama_huni', $this->delete_id)->first();
        $getLamaHuniDestroy->delete();
        $this->dispatchBrowserEvent('destroyLamaHuni');
    }


    // reset input dan close modal

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->lama_huni = '';
        $this->inputBulan = '';
    }


    //akhir dari reset input dan close modal


    public function render()
    {
        $search = '%' . $this->search . '%';
        $dataLamaHuni = Lama_huni::where('lama_huni', 'like', $search)->paginate(6);
        return view('livewire.backend.data-lama-huni', compact('dataLamaHuni'))
            ->extends('layouts.main')
            ->section('content');
    }
}
