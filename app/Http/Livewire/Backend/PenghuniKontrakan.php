<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\penghuni;
use App\Models\Lama_huni;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\Tagihan_penghuni;

class PenghuniKontrakan extends Component
{

    use WithPagination;
    public $unit_kontrakan, $harga_unit_kontrakan, $lamaHuniSelected, $jatuh_tempo_tagihan, $id_user;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $update;
    public $getPenghuni, $getTagihanPenghuni;



    protected $rules = [
        'lamaHuniSelected' => 'required',
        'jatuh_tempo_tagihan' => 'required',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createTagihan($id_penghuni)
    {
        $this->getPenghuni = penghuni::with(['transaksi'])->find($id_penghuni);
        $this->lamaHuniSelected = $this->getPenghuni->tagihan_lama_huni;
        $this->jatuh_tempo_tagihan = $this->getPenghuni->jatuh_tempo_tagihan;
    }

    public function newTagihanPenghuni()
    {
        $validatedData = $this->validate();
        //update table transaksi untuk kolom lama huni
        $this->getPenghuni->update(['tagihan_lama_huni' =>  $this->lamaHuniSelected]);
        //tutup

        //update table penghuni untuk kolom status tagihan menjadi dua dan jatuh tempo disesuaikan dengan yang dipilih
        $this->getPenghuni->update(['status_tagihan' =>  2, 'jatuh_tempo_tagihan' =>  $this->jatuh_tempo_tagihan]);
        //tutup

        Tagihan_penghuni::create([
            'id_tagihan_penghuni' => Str::uuid(),
            'id_penghuni' =>    $this->getPenghuni->id_penghuni,
            'id_user' =>      $this->getPenghuni->transaksi->id_user,
            'status_pembayaran_tagihan' => 0

        ]);
        $this->dispatchBrowserEvent('newTagihanPenghuni');
        $this->resetInput();
    }


    public function tagihanPenghuni($id_penghuni)
    {
        //fungsi update jika tagihan huni sudah ada disini kita akan buat objek get tagihan huni untuk ngambil relasi dari table tagihan penghuni, penghuni dan transaksi make nested relasi
        // LARAVEL DE BEST KALO PHP NATIVE MANA BISA KYK GINI AWKAKWAKWK
        $this->getTagihanPenghuni = Tagihan_penghuni::with(['penghuni.transaksi'])->where('id_penghuni', $id_penghuni)->first();

        $this->lamaHuniSelected = $this->getTagihanPenghuni->penghuni->tagihan_lama_huni;

        $this->jatuh_tempo_tagihan = $this->getTagihanPenghuni->penghuni->jatuh_tempo_tagihan;
    }

    public function existTagihanPenghuni()
    {
        $validatedData = $this->validate();
        //fungsi upddate lanjutan dari atas yang dimana dibawah ini semuanya akan melakukan update pada 3 table dan 4 kolom yang berbeda dalam satu waktu eksekusi
        $this->getTagihanPenghuni->penghuni->update(['tagihan_lama_huni' => $this->lamaHuniSelected]);

        $this->getTagihanPenghuni->penghuni->update(['status_tagihan' =>  2, 'jatuh_tempo_tagihan' =>  $this->jatuh_tempo_tagihan]);

        $this->getTagihanPenghuni->update(['id_tagihan_penghuni' => Str::uuid()]); //REMINDER SEBELUMNYA JIKA PADA MODEL TIDAK DIBERIKAN TRAIT HASUUID MAKA SATU BARIS KODE INI TIDAK BISA DIJALANKAN


        // KITA BELUM SELESAI DIKARENAKAN SEMUA INI BELUM ADA VALIDASINYA, NEXT KITA KERJAKAN VALIDASI

        $this->dispatchBrowserEvent('existTagihanPenghuni');
        $this->resetInput();
    }



    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->jatuh_tempo_tagihan = '';
        $this->lamaHuniSelected = '';
    }

    public function render()
    {

        $search = '%' . $this->search . '%';
        $lama_huni = Lama_huni::all();
        $data_penghuni =
            penghuni::with(['transaksi'])->where('status_tagihan', 'like', $search)->orWhereHas('transaksi', function ($query) {
                return $query->where('unit_kontrakan', 'like', $this->search);
            })
            ->paginate(6);
        return view('livewire.backend.penghuni-kontrakan', compact('data_penghuni', 'lama_huni'))
            ->extends('layouts.main')->section('content');
    }
}
