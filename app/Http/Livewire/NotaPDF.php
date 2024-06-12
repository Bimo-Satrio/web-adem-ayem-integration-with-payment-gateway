<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\PengajuanSewa;
use Barryvdh\DomPDF\Facade\Pdf;

class NotaPDF extends Component
{

    public $pengajuan_sewa, $tanggal_mulai;



    public function download_nota($id_pengajuan_sewa)
    {

        $this->pengajuan_sewa = PengajuanSewa::where('id_pengajuan_sewa', $id_pengajuan_sewa)->first();
        $this->tanggal_mulai = Carbon::parse($this->pengajuan_sewa->tanggal_huni)->addDays(1);



        $pdf = Pdf::loadView('livewire.nota-p-d-f', ['pengajuan_sewa' => $this->pengajuan_sewa], ['tanggal_mulai' => $this->tanggal_mulai]);

        return $pdf->download('Nota ' . $this->pengajuan_sewa->id_pengajuan_sewa . '.pdf');
    }


    public function render($id_pengajuan_sewa)
    {
        $pengajuan_sewa = PengajuanSewa::where('id_pengajuan_sewa', $id_pengajuan_sewa)->first();

        $tanggal_mulai = Carbon::parse($pengajuan_sewa->tanggal_huni)->addDays(1);

        return view('livewire.nota-p-d-f', \compact('pengajuan_sewa', 'tanggal_mulai'))->extends('layouts.apps')->section('content');
    }
}
