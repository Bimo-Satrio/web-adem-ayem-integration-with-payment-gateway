<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\FAQModel;
use Illuminate\Support\Str;

class FAQPost extends Component
{


    public $judul_faq, $isi_faq;


    protected $rules = [
        'judul_faq' => 'required|min:6|max:30',
        'isi_faq' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function faqPost()
    {
        $validatedData = $this->validate();

        $faqPost = ([
            'id_faq' => Str::uuid(),
            'judul_faq' => $validatedData['judul_faq'],
            'isi_faq' => $validatedData['isi_faq'],
        ]);

        FAQModel::create($faqPost);
        $this->dispatchBrowserEvent('faqPostSuccess');
    }
    public function render()
    {
        return view('livewire.backend.f-a-q-post')->extends('layouts.main')->section('content');
    }
}
