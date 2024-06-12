<?php

namespace App\Http\Livewire\Backend;


use App\Models\User;
use Livewire\Component;
use App\Models\Kontrakan;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\WaitingListModel;

class WaitingList extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'batalHapusWaitingList' => 'hapus',
        'selesaiWaiting' => 'done'
    ];
    public $userWaitingList, $kontrakanWaitingList, $tanggal_pengajuan, $status_waiting_list;
    public $get_id, $get_id_waiting;

    public function addWaitingList()
    {
        WaitingListModel::create([
            'id_waiting_list' => Str::uuid(),
            'id_user' => $this->userWaitingList,
            'id_kontrakan' => $this->kontrakanWaitingList,
            'tanggal_pengajuan' => $this->tanggal_pengajuan,
            'status_waiting_list' => 0
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('addWaitingListSuccess');
    }

    public function selesai($id_waiting_list)
    {
        $this->get_id_waiting = $id_waiting_list;
        $this->dispatchBrowserEvent('selesaiWaitingList');
    }

    public function done()
    {
        $done = WaitingListModel::where('id_waiting_list', $this->get_id_waiting)->first();
        $done->update(['status_waiting_list' => 1]);
    }


    public function hapusWaiting($id_waiting_list)
    {

        $this->get_id = $id_waiting_list;
        $this->dispatchBrowserEvent('hapusWaitingList');
    }

    public function hapus()
    {

        $hapus = WaitingListModel::where('id_waiting_list', $this->get_id)->first();
        $hapus->delete();



        $this->dispatchBrowserEvent('waitingdeletesucess');
    }



    public function resetInput()
    {
        $this->userWaitingList = '';
        $this->kontrakanWaitingList = '';
    }


    public function closeModal()
    {
        $this->resetInput();
    }


    public function render()
    {
        $waitingList = WaitingListModel::with('user', 'kontrakan')->orderBy('updated_at', 'desc')->paginate(10);

        $users = User::where('is_admin', 0)->get();

        $unit_kontrakan = Kontrakan::get();



        return view('livewire.backend.waiting-list', \compact('waitingList', 'users', 'unit_kontrakan'))->extends('layouts.main')->section('content');
    }
}
