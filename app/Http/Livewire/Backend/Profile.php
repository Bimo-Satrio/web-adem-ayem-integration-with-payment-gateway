<?php

namespace App\Http\Livewire\Backend;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $getUser, $editNameProfile, $emailEditProfile, $noTelefonEditProfile, $userEdit;


    public function mount()
    {

        $this->getUser = Auth::user();
        $this->editNameProfile = $this->getUser->name;
        $this->emailEditProfile = $this->getUser->email;
        $this->noTelefonEditProfile = $this->getUser->no_telefon;
    }

    public function saveEditProfile()
    {
        $this->userEdit = User::find($this->getUser)->first();
        $this->userEdit->name  = $this->editNameProfile;
        $this->userEdit->email =  $this->emailEditProfile;
        $this->userEdit->no_telefon =   $this->noTelefonEditProfile;
        $this->userEdit->update();
        $this->dispatchBrowserEvent('profileEditSuccess');
    }


    public function render()
    {
        return view('livewire.backend.profile')->extends('layouts.main')->section('content');
    }
}
