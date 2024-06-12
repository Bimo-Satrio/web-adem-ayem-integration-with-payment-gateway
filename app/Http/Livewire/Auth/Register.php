<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Jobs\SendUserEmail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class Register extends Component
{

    public  $email, $password, $konfirmasi_password, $nomor_telefon, $nama_lengkap, $username;

    protected $rules = [
        'username' => ['required', 'string', 'min:1', 'max:10'],
        'nama_lengkap' => ['required', 'string', 'max:50'],
        'email' => ['required', 'string', 'email', 'min:1', 'max:255', 'unique:users'],
        'nomor_telefon' => ['required', 'min:1', 'max:15'],
        'password' => ['required', 'string', 'min:8', 'max:255'],
        'konfirmasi_password' => ['required', 'string', 'min:8', 'same:password', 'max:255'],
    ];


    public function mount()
    {
        if (Auth::check()) {
            return \redirect()->to('/');
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createAccount()
    {
        $validatedData = $this->validate();
        $userCreate = User::create([
            'id_user' => Str::uuid(),
            'username' => $this->username,
            'nama_lengkap' => $this->nama_lengkap,
            'no_telefon' => $this->nomor_telefon,
            'email' => $this->email,
            'is_admin' => 0,
            'password' => Hash::make($this->password)

        ]);
        Auth::login($userCreate, true);
        SendUserEmail::dispatch($userCreate);
        return redirect()->to(RouteServiceProvider::HOME);
    }


    public function render()
    {
        return view('livewire.auth.register')
            ->extends('layouts.auth');
    }
}
