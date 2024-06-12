<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Identitas;
use App\Models\PengajuanSewa;
use App\Models\Transaksi;
use Error;

use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class UploadIdentitas extends Component
{
    use WithFileUploads;

    public $foto_kartu_tanda_penduduk;
    public $transaksiItem;
    public $totaltransaksiAmount;
    public $storetransaksiItem;
    public $transaksi;
    public $id_pengajuan_sewa;
    public $idtransaksi;
    public $getIdTranskasi;
    public $foto_dengan_kartu_tanda_penduduk;
    public $foto_kartu_keluarga;


    protected $rules = [
        'foto_kartu_tanda_penduduk' => 'required|image|mimes:png,jpg,jpeg',
        'foto_dengan_kartu_tanda_penduduk' => 'required|image|mimes:png,jpg,jpeg',
        'foto_kartu_keluarga' => 'required|image|mimes:png,jpg,jpeg',
    ];



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // public function updatedkartu_tanda_penduduk()
    // {
    //     $this->validate([
    //         'kartu_tanda_penduduk' => 'required|image|mimes:png,jpg,jpeg',
    //     ]);
    // }

    // public function updatedkartu_tanda_pendudukelfie()
    // {
    //     $this->validate([
    //         'foto_dengan_kartu_tanda_penduduk' => 'required|image|mimes:png,jpg,jpeg',
    //     ]);
    // }


    public function mount($id_pengajuan_sewa)
    {
        try {
            if (Auth::user()) {

                $this->transaksi = PengajuanSewa::findOrFail($id_pengajuan_sewa);
                if (Auth::user()->id_user) {
                } else {
                    return redirect()->to('/');
                }
            } else {
                return redirect()->to('/');
            }
        } catch (\Exception $e) {
            \abort(404);
        }
    }



    public function store()
    {
        $validatedData = $this->validate();
        $foto_kartu_tanda_penduduk =   $this->foto_kartu_tanda_penduduk->store('identitas');
        $foto_dengan_kartu_tanda_penduduk = $this->foto_dengan_kartu_tanda_penduduk->store('identitas');
        $foto_kk = $this->foto_kartu_keluarga->store('identitas');
        $this->storetransaksiItem = Identitas::create(

            [
                'id_identitas' => Str::uuid(),
                'id_pengajuan_sewa' => $this->id_pengajuan_sewa,
                'foto_ktp' =>  $this->foto_kartu_tanda_penduduk,
                'foto_dengan_ktp' => $this->foto_dengan_kartu_tanda_penduduk,
                'foto_kk' => $this->foto_kartu_keluarga,
            ]
        );
        PengajuanSewa::where('id_pengajuan_sewa', $this->id_pengajuan_sewa)->update(['status_identitas' => 1]);


        Session::forget('sessionRent');


        $this->dispatchBrowserEvent('ktpUploadSuccess');
        return redirect()->route('admin-process');
    }




    public function render()
    {
        return view('livewire.upload-identitas', [
            'transaksi' => $this->transaksi
        ])
            ->extends('layouts.apps')->section('content');
    }
}
