<?php

namespace App\Http\Livewire\Auth;


use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class Login extends Component
{

    public $username, $password, $remember;

    public function mount()
    {
        if (Auth::check()) {
            return \redirect()->to('/');
        }
    }

    protected $rules = [

        'username' => ['required', 'string', 'min:1', 'max:20'],
        'password' => ['required', 'string', 'min:8', 'max:255'],

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();
        $throttleKey = strtolower($this->username) . '|' . request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $this->addError('username', __('auth.throttle', [
                'seconds' => RateLimiter::availableIn($throttleKey)
            ]));
            return null;
        }


        if (!Auth::attempt($this->only(['username', 'password']), $this->remember)) {
            RateLimiter::hit($throttleKey);
            $this->addError('username', __('auth.failed'));
            return null;
        }


        if (Auth::user()->is_admin == 2) {
            return redirect()->to('backend/dashboard');
        } else {
            return redirect()->to('/');
        }
    }


    public function render()
    {

        return view('livewire.auth.login')->extends('layouts.auth')->section('content');
    }
}
