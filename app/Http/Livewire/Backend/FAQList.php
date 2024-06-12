<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\FAQModel;
use Livewire\WithPagination;

class FAQList extends Component
{

    use WithPagination;
    protected $listeners = ['deleteFAQConfirmed' => 'delete'];
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $delete_id;

    public  function confirmationdelete($id_faq)
    {
        $this->delete_id = $id_faq;
        $this->dispatchBrowserEvent('deleteFAQConfirmation');
    }

    public function delete()
    {
        $delete = FAQModel::where('id_faq', $this->delete_id)->first();
        $delete->delete();

        $this->dispatchBrowserEvent('deleteFAQsucess');
    }


    public function render()
    {
        $search = '%' . $this->search . '%';
        $getFAQ = FAQModel::where('judul_faq', 'like',  $search)->paginate(5);
        return view('livewire.backend.f-a-q-list', compact('getFAQ'))
            ->extends('layouts.main')
            ->section('content');
    }
}
