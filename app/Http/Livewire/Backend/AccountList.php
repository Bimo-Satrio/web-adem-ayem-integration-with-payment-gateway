<?php

namespace App\Http\Livewire\Backend;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Exports\PaymentsExport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AccountList extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        'destroyUserConfirm' => 'destroyUser'
    ];
    public $name, $email, $password, $password_confirmation, $selectedRoles;
    public $destroy_user;
    public $getUserID, $getUserIdToUpdate, $is_admin, $currentRoles;
    public $nameUpdate, $emailUpdate, $is_adminUpdate;


    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'selectedRoles' => ['required'],
        'password' => ['required', 'string', 'min:8'],
        'password_confirmation' => ['required', 'string', 'min:8', 'same:password'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function userAdd()
    {

        $validatedData = $this->validate();


        $userCreate = ([
            'id_user' => Str::uuid(),
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'is_admin' => $validatedData['selectedRoles'],
            'password' => Hash::make($validatedData['password'])

        ]);
        User::create($userCreate);
        $this->resetInput();
        $this->dispatchBrowserEvent('userAddSuccess');
    }


    public function destroyUserConfirm($id_user)
    {
        $this->destroy_user = $id_user;
        $this->dispatchBrowserEvent('userDeleteConfirmation');
    }


    public function destroyUser()
    {
        $getUser = User::where('id_user', $this->destroy_user)->first();
        $getUser->delete();

        $this->dispatchBrowserEvent('userDeleteSucess');
    }

    public function getUserId($id_user)
    {

        $this->getUserID = user::where('id_user', $id_user)->first();
        $this->nameUpdate = $this->getUserID->name;
        $this->emailUpdate = $this->getUserID->email;
        $this->currentRoles =   ($this->getUserID->is_admin == 1) ? 'admin' : 'user';
        $this->is_adminUpdate = $this->getUserID->is_admin;
    }

    public function userUpdate()
    {

        $validateData = $this->validate([
            'nameUpdate'  => ['required', 'string', 'max:255'],
            'emailUpdate' => ['required', 'string', 'email'],
            'is_adminUpdate' => ['required'],
        ]);

        $user = User::find($this->getUserID)->first();
        $user->name = $validateData['nameUpdate'];
        $user->email = $validateData['emailUpdate'];
        $user->is_admin = $validateData['is_adminUpdate'];
        $user->update();


        $this->dispatchBrowserEvent('userUpdate');
        $this->resetInput();
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->selectedRoles = '';
    }


    public function export($id_user)
    {

        return Excel::download(new PaymentsExport($id_user), 'invoices.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }


    public function render()
    {
        $search = '%' . $this->search . '%';
        $showAllAccount = User::where('name', 'like', $search)
            ->orWhere('email', 'like', $search)->paginate(6);
        return view('livewire.backend.account-list', compact('showAllAccount'))
            ->extends('layouts.main')
            ->section('content');
    }
}
