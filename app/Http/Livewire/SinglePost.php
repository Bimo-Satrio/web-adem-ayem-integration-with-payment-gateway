<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Kontrakan;
use App\Models\lama_huni;
use Error;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SinglePost extends Component
{
    public $kontrakan;
    public $lama_huni;
    public $lamaHuniSelected;
    public $datePicker;
    public $valueLamaHuni;
    public $user;
    public $id_kontrakan;


    public function mount($id_kontrakan)
    {

        try {
            $this->user = Auth::user();
            $this->lama_huni = lama_huni::all();
            $this->kontrakan = Kontrakan::with('foto_kontrakan')->findOrFail($id_kontrakan);
        } catch (Error $e) {
            abort(404);
        }
    }

    // protected $rules = [
    //     'lamaHuniSelected' => 'required',
    //     'datePicker' => 'required',
    // ];


    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }


    // public function updatedlamaHuniSelected($value)
    // {
    //     $this->valueLamaHuni = lama_huni::where('bulan', $value)->first()->lama_huni;
    // }


    public function savetoSession($id_kontrakan)
    {

        // $validatedData = $this->validate();
        if (Auth::user()) {
            if ($this->kontrakan->where('id_kontrakan', $id_kontrakan)->exists()) {

                if ($this->user->hasVerifiedEmail() == NULL) {
                    $this->dispatchBrowserEvent('noVerifiedEmail');
                } else {

                    if (Session::has('sessionRent') && collect(Session::get('sessionRent'))->isNotEmpty()) {
                        $this->dispatchBrowserEvent('bookingfailed');
                    } else {
                        if ($this->kontrakan->status_ketersediaan > 0) {
                            Session::push('sessionRent', [
                                'id_kontrakan' => $this->id_kontrakan,
                                'id_user' => auth()->user()->id_user,
                                'unit_kontrakan' => $this->kontrakan->kontrakan,
                                'foto_kontrakan' => $this->kontrakan->foto_kontrakan->first(),
                                'harga_unit_kontrakan' => $this->kontrakan->harga,
                                'lokasi' => $this->kontrakan->lokasi,
                                // 'lama_huni_unit_kontrakan' => $this->valueLamaHuni,
                                'jumlah' => 1,
                                // 'tanggal_huni' => $this->datePicker,
                                'status_transaksi' => 1,
                                'status_identitas' => 1,
                            ]);
                            // dd(Session::get('sessionRent'));
                            return redirect()->to('rent');

                            $this->dispatchBrowserEvent('rentsuccess');
                        } else {
                            $this->dispatchBrowserEvent('outofstok');
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('notfound');
            }
        } else {
            $this->dispatchBrowserEvent('warntologin');
        }
    }

    public function forgetSession()
    {
        Session::forget('sessionRent');
    }


    public function render()
    {

        return view(
            'livewire.single-post',
            ['kontrakan' => $this->kontrakan],
            ['lama_huni' => $this->lama_huni],


        )
            ->extends('layouts.apps')->section('content');
    }
}
