<?php

namespace App\Http\Livewire;



use App\Models\User;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaymentsExport;
use Illuminate\Support\Facades\Auth;

class AdminProcess extends Component
{
    public $users;

    public function mount()
    {


        if (Auth::user()) {

            if (Auth::user()->id_user) {
                $this->users = User::where('is_admin', 1)->first();
            } else {
                return \redirect()->route('/');
            }
        } else {
            return \redirect()->route('/');
        }
    }

    public function render()
    {

        return view('livewire.admin-process', ['users' => $this->users])
            ->extends('layouts.apps')->section('content');
    }
}
