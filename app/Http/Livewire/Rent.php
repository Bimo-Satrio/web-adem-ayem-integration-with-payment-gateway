<?php

namespace App\Http\Livewire;

use Error;
use App\Models\user;
use Livewire\Component;
use App\Models\Kontrakan;
use App\Models\Lama_huni;
use App\Models\PengajuanSewa;
use App\Models\SyaratKetentuanModel;
use App\Models\TentangModel;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class Rent extends Component
{
    public $totalHarga;
    public $value;
    public $id_kontrakan;
    public $getUser;
    public $nama_lengkap, $nomor_telefon, $email;
    public $user;
    public $tentangModel;
    public $lama_huni;
    public $lama_huni_select;
    public $ppn;
    public $tanggal_huni;
    public $total;
    protected $rules = [
        'nama_lengkap'  => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email'],
        'nomor_telefon' => ['required', 'min:1', 'max:15'],
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }



    public function mount()
    {

        $this->ppn = 10000;
        $this->tentangModel =  SyaratKetentuanModel::all();
        $this->lama_huni = Lama_huni::all();

        if ($this->value = Session::get('sessionRent') == NULL) {
            return redirect()->to('/');
        } else {
            $this->value = Session::get('sessionRent');
        }
    }




    public function storeSessionRent()
    {

        $id_transaksi = Str::uuid();
        $transactions = Session::get('sessionRent');
        foreach ($transactions as $transaction) {

            $id_kontrakan = $transaction['id_kontrakan'];
            $id_user = $transaction['id_user'];
            $unit_kontrakan = $transaction['unit_kontrakan'];
            $harga_unit_kontrakan = $transaction['harga_unit_kontrakan'];
            // $lama_huni_unit_kontrakan = $transaction['lama_huni_unit_kontrakan'];
            $jumlah = $transaction['jumlah'];
            // $tanggal_huni = $transaction['tanggal_huni'];
            $debug =  PengajuanSewa::create([
                'id_transaksi' => $id_transaksi,
                'id_user' => $id_user,
                'nama_lengkap' => Auth::user()->name,
                'email_user' => Auth::user()->email,
                'nomor_telefon' => Auth::user()->no_telefon,
                'unit_kontrakan' => $unit_kontrakan,
                'harga_unit_kontrakan_total' => $this->ppn + $this->lama_huni_select * $harga_unit_kontrakan,
                'lama_huni_unit_kontrakan' => $this->lama_huni_select,
                'jumlah' =>  $jumlah,
                'status_transaksi' => 1,
                'status_identitas' => 1,
                'status_huni' => 1,
                'tanggal_huni' =>  $this->tanggal_huni,
            ]);
            // \dd($debug);
            Kontrakan::where('id_kontrakan', $id_kontrakan)->decrement('status_ketersediaan', 1);
            Session::forget('sessionRent');
            return redirect()->to('identityupload/' . $id_transaksi);
        }
    }

    public function destroySessionRent()
    {
        Session::forget('sessionRent');
    }


    public function editProfile($id_user)
    {
        $this->getUser = user::where('id_user', $id_user)->first();
        $this->nama_lengkap = $this->getUser->name;
        $this->email = $this->getUser->email;
        $this->nomor_telefon = $this->getUser->no_telefon;
    }




    public function saveEditProfile()
    {
        $validatedData = $this->validate();

        $this->user = user::find($this->getUser)->first();
        $this->user->name  = $validatedData['nama_lengkap'];
        $this->user->email = $validatedData['email'];
        $this->user->no_telefon =  $validatedData['nomor_telefon'];
        $this->user->update();
        $this->dispatchBrowserEvent('editProfileSuccess');
        $this->resetinput();
    }

    public function resetinput()
    {
        $this->getUser = '';
        $this->nama_lengkap = '';
        $this->email = '';
        $this->nomor_telefon = '';
    }

    public function closeModal()
    {
        $this->resetinput();
    }


    public function render()
    {
        return view(
            'livewire.rent',
            [
                'value' => $this->value
            ],
            ['tentangModel' => $this->tentangModel],
            ['ppn' => $this->ppn]
        )->extends('layouts.apps')->section('content');
    }
}
