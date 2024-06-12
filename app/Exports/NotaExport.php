<?php

namespace App\Exports;

use App\Models\PengajuanSewa;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class NotaExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */


    use Exportable;


    private $id_pengajuan_sewa;

    public function __construct($id_pengajuan_sewa)
    {
        $this->id_pengajuan_sewa = $id_pengajuan_sewa;
    }




    public function view(): View
    {
        return view('exports.nota', [
            'notas' => PengajuanSewa::query()->where('id_pengajuan_sewa', $this->id_pengajuan_sewa)->get()
        ]);
    }
}
