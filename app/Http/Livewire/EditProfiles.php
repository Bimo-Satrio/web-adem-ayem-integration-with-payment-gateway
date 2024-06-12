<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditProfiles extends Component
{

    public $getUser, $name, $email, $getUserBasedOnID;
    public $getUserChange;
    public function mount()
    {

        if (!Auth::user()) {
            return redirect()->to('/');

            if (!Auth::user()->id) {
                return redirect()->to('/');
            }
        } else {
            $this->getUser = Auth::user();
            $this->name = $this->getUser->name;
            $this->email = $this->getUser->email;
        }
    }

    public function submitUserChange()
    {
        $id_user = Auth::user()->id;
        $this->getUserChange = User::where('id', $id_user);
        $this->getUserChange->name = $this->name;
        $this->getUserChange->email = $this->email;
        $this->getUserChange->update();

        $this->dispatchBrowserEvent('userChangeSuccess');
        return redirect()->to('/');
    }
    public function render()
    {
        return view('livewire.edit-profiles')
            ->extends('layouts.apps');
    }
}
