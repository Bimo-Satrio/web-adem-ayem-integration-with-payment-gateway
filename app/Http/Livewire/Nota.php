<?php

namespace App\Http\Livewire;

use Exception;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\PengajuanSewa;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class Nota extends Component
{

    public $pengajuan_sewa;
    public $download_nota;
    public $mulai_huni;
    public $tanggal_mulai;
    public function mount($id_pengajuan_sewa)
    {

        try {
            if (Auth::user()) {
                $this->pengajuan_sewa =  PengajuanSewa::where('id_pengajuan_sewa', $id_pengajuan_sewa)->first();

                $this->tanggal_mulai = Carbon::parse($this->pengajuan_sewa->tanggal_huni)->addDays(1);
            } else {

                return redirect()->route('/');
            }
        } catch (Exception $e) {
        }
    }



    public function render()
    {
        return view('livewire.nota', ['pengajuansewa' => $this->pengajuan_sewa], ['tanggal_mulai' => $this->tanggal_mulai])->extends('layouts.apps')->section('content');
    }
}
