<?php

namespace App\Http\Livewire;


use App\Models\CarouselModel;
use Livewire\Component;
use App\Models\Kontrakan;
use Livewire\WithPagination;

class Home extends Component
{

    public $search = '';
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $search = '%' . $this->search . '%';
        $kontrakan  = Kontrakan::with('foto_kontrakan')->where('kontrakan', 'like',  $search)
            ->orWhere('deskripsi', 'like',  $search)->orderBy('created_at', 'desc')->paginate(6);

        $getCarousel = CarouselModel::all();


        return view('livewire.home', compact('kontrakan', 'getCarousel'))

            ->extends('layouts.apps')->section('content');
    }
}
