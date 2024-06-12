<?php

namespace App\Http\Livewire\Pemilik;

use App\Models\User;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\exception_for;

class ProfilePemilik extends Component
{

    public $username, $nama_lengkap, $email, $no_telefon;
    public $userEdit;

    protected $rules = [];



    protected function rules()
    {
        if (Auth::user()) return [
            'username'  => ['required', 'string', 'max:255'],
            'nama_lengkap' => ['required', 'string', 'min:1', 'max:50'],
            'email' => ['required', 'min:1', 'max:255', 'email'],
            'no_telefon' => ['required', 'min:1', 'max:15']
        ];

        else return [
            'username'  => ['required', 'string', 'max:255', 'unique:users'],
            'nama_lengkap' => ['required', 'string', 'min:1', 'max:50'],
            'email' => ['required', 'min:1', 'max:255', 'email', 'unique:users'],
            'no_telefon' => ['required', 'min:1', 'max:15', 'unique:users']
        ];
    }


    public function editProfile($id_user)
    {
        $this->userEdit = User::find($id_user)->first();

        $this->username = $this->userEdit->username;
        $this->nama_lengkap =  $this->userEdit->nama_lengkap;
        $this->email =  $this->userEdit->email;
        $this->no_telefon = $this->userEdit->no_telefon;
    }


    public function saveEditProfile()
    {
        try {
            $validatedData = $this->validate();

            $this->userEdit->username  = $validatedData['username'];
            $this->userEdit->nama_lengkap = $validatedData['nama_lengkap'];
            $this->userEdit->email = $validatedData['email'];
            $this->userEdit->no_telefon =  $validatedData['no_telefon'];
            $this->userEdit->update();
            $this->resetinput();
            $this->dispatchBrowserEvent('saveEditProfille');
        } catch (Exception $e) {
            \abort(400);
        }
    }

    public function closeModal()
    {
        $this->resetinput();
    }



    public function resetinput()
    {
        $this->username = '';
        $this->nama_lengkap = '';
        $this->email = '';
        $this->no_telefon = '';
    }



    public function render()
    {
        return view('livewire.pemilik.profile-pemilik')->extends('layouts.owner')->section('content');
    }
}
