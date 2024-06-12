<?php

namespace App\Http\Livewire;

use App\Models\Tagihan_penghuni;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Error;
use Livewire\WithFileUploads;

class UserProfiles extends Component
{
    use WithFileUploads;
    public $user;
    public $getUser;
    public $editNameProfile, $noTelefonEditProfile, $emailEditProfile;
    public $userEdit;
    public $tentangModel, $addProfilePicture;

    protected $rules = [
        'editNameProfile'  => ['required', 'string', 'max:255'],
        'emailEditProfile' => ['required', 'string', 'email'],
        'noTelefonEditProfile' => ['required', 'min:1', 'max:15'],
        'addProfilePicture' => ['image', 'mimes:png,jpg,jpeg']
    ];



    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedAddProfilePicture()
    {
        $this->validate([
            'addProfilePicture' => ['image', 'mimes:png,jpg,jpeg'] // 1MB Max
        ]);
    }





    public function mount()
    {

        if (!Auth::user()) {
            return redirect()->to('/');

            if (!Auth::user()->id_user) {
                return redirect()->to('/');
            }
        } else {
            Auth::user();
        }
    }




    public function editProfile($id_user)
    {
        $this->getUser = user::findOrFail($id_user);
        $this->editNameProfile = $this->getUser->username;
        $this->emailEditProfile = $this->getUser->email;
        $this->noTelefonEditProfile = $this->getUser->no_telefon;
    }




    public function saveEditProfile()
    {

        try {
            $validatedData = $this->validate();

            $addProfilePicture =   $this->addProfilePicture->store('identitas');

            $this->userEdit = user::find($this->getUser)->first();
            $this->userEdit->avatar = $addProfilePicture;
            $this->userEdit->name  = $validatedData['editNameProfile'];
            $this->userEdit->email = $validatedData['emailEditProfile'];
            $this->userEdit->no_telefon =  $validatedData['noTelefonEditProfile'];
            $this->userEdit->update();
            $this->dispatchBrowserEvent('userEditProfileSuccess');
            $this->resetinput();
        } catch (Error $e) {
            return redirect()->route('user-profiles');
        }
    }

    public function resetinput()
    {
        $this->getUser = '';
        $this->editNameProfile = '';
        $this->emailEditProfile = '';
        $this->noTelefonEditProfile = '';
    }

    public function closeModal()
    {
        $this->resetinput();
    }



    public function render()
    {

        $getTagihanPenghuni = Tagihan_penghuni::with(['penghuni.PengajuanSewa'])
            ->whereHas('penghuni.PengajuanSewa', function ($query) {
                $query->where('id_user', Auth::user()->id_user);
            })
            ->orderBy('created_at', 'desc')->get();



        return view('livewire.user-profiles', compact('getTagihanPenghuni'))
            ->extends('layouts.apps')->section('content');
    }
}
