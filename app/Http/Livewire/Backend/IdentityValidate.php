<?php


namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\Identitas;
use App\Models\pengajuan_sewa;
use App\Models\PengajuanSewa;
use Livewire\WithPagination;


class IdentityValidate extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $imagePath, $selectedData, $id_pengajuan_sewa;
    public $filter;

    protected $queryString = ['search'];
    protected function rules()
    {
        return [

            'selectedData' => 'required',
        ];
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }



    public function showDetail(int $id_pengajuan_sewa)
    {
        $pengajuan_sewa = PengajuanSewa::with('identitas')->find($id_pengajuan_sewa);
        if ($pengajuan_sewa) {
            $this->id_pengajuan_sewa = $pengajuan_sewa->id_pengajuan_sewa;
            $this->imagePath  = asset('identitas/' . $pengajuan_sewa->identitas->foto_ktp);
        } else {
            dd($pengajuan_sewa);
        }
    }


    public function updateVal()
    {

        $validateData = $this->validate([
            'selectedData' => 'required',
        ]);

        PengajuanSewa::where('id_pengajuan_sewa', $this->id_pengajuan_sewa)->update([
            'status_pengajuan_sewa' => $validateData['selectedData']
        ]);
        $this->resetInput();
        $this->dispatchBrowserEvent('updatedVal');
    }


    public function closeModal()
    {
        $this->resetInput();
    }


    public function resetInput()
    {
        $this->selectedData = '';
    }

    public function render()
    {

        $pengajuan_sewa =  Identitas::join('pengajuan_sewa', 'identitas.id_pengajuan_sewa', '=', 'pengajuan_sewa.id_pengajuan_sewa')
            ->when($this->search, function ($query) {
                return $query->where('pengajuan_sewa.unit_kontrakan', 'like', $this->search)
                    ->orWhere('pengajuan_sewa.id_pengajuan_sewa', 'like', $this->search);
            })
            ->when($this->filter != 0, function ($query) {
                return $query->where('pengajuan_sewa.status_pengajuan_sewa', $this->filter);
            })

            ->paginate(6);

        return view('livewire.backend.identity-validate', compact('pengajuan_sewa'))
            ->extends('layouts.main')->section('content');
    }
}
