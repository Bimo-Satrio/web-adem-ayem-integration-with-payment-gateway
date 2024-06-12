<?php

namespace App\Http\Livewire\Backend;


use Livewire\Component;
use App\Models\penghuni;
use App\Models\Kontrakan;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\fotokontrakan;
use App\Models\Lama_huni;
use App\Models\PengajuanSewa;
use Livewire\WithFileUploads;


class Unitkontrakan extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $listeners = ['deleteConfirmed' => 'delete'];
    protected $paginationTheme = 'bootstrap';
    public $kontrakan, $deskripsi, $lokasi, $harga_unit_kontrakan, $stok, $images = [];
    public $FotoKontrakan, $delete_id;
    public $search = '';
    public $id_kontrakan, $nama_penghuni, $no_telefon;
    public $id_transaksi, $jatuh_tempo_tagihan, $status_tagihan, $tagihanhuni;


    protected $rules = [
        'id_transaksi' => 'required',
        'jatuh_tempo_tagihan' => 'required',
        'status_tagihan' => 'required',
        'tagihanhuni' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function addPenghuni($id_kontrakan)
    {
        $getKontrakan = Kontrakan::findOrFail($id_kontrakan);
        if ($getKontrakan) {
            $this->id_kontrakan = $getKontrakan->id_kontrakan;
            $this->kontrakan = $getKontrakan->kontrakan;
            $this->harga_unit_kontrakan = "Rp " . number_format($getKontrakan->harga);
        } else {

            dd($getKontrakan);
        }
    }

    public function penghuniAdd()
    {
        $validatedData = $this->validate();
        penghuni::create([
            'id_penghuni' => Str::uuid(),
            'id_transaksi' => $this->id_transaksi,
            'jatuh_tempo_tagihan' => $this->jatuh_tempo_tagihan,
            'tagihan_lama_huni' => $this->tagihanhuni,
            'status_tagihan' => $this->status_tagihan,
        ]);
        PengajuanSewa::find($this->id_transaksi)->update(['status_huni' => 2]);

        $this->dispatchBrowserEvent('penguniAddSuccess');
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->id_transaksi = '';
        $this->status_tagihan = '';
        $this->jatuh_tempo_tagihan = '';
    }


    public function closeModal()
    {
        $this->resetInput();
    }
    public  function confirmationdelete($id_kontrakan)
    {
        $this->delete_id = $id_kontrakan;
        $this->dispatchBrowserEvent('deleteConfirmation');
    }


    public function delete()
    {
        $hapus = Kontrakan::where('id_kontrakan', $this->delete_id)->first();
        $hapus->delete();


        $images = fotokontrakan::where('id_kontrakan', $this->delete_id)->get();
        foreach ($images as $image) {
            $path = public_path('fotokontrakan' . $image->foto_kontrakan);
            if (file_exists($path)) {
                unlink($path);
            }
            $image->delete();
        }
        $this->dispatchBrowserEvent('deletesucess');
    }


    public function render()
    {
        $Lama_huni = Lama_huni::all();
        $search = '%' . $this->search . '%';
        $getUser = PengajuanSewa::with('user')->get();
        $data_kontrakan = Kontrakan::with('foto_kontrakan')->where('kontrakan', 'like',  $search)
            ->orWhere('deskripsi', 'like',  $search)->paginate(6);
        return view(
            'livewire.backend.unitkontrakan',
            compact('getUser', 'data_kontrakan', 'Lama_huni')
        )
            ->extends('layouts.main')->section('content');
    }
}
