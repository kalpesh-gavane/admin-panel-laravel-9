<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUser extends Component
{
    public $user;
    public $userId;
    public $action;
    public $button;
    public $rolesList, $selectedRoles = [], $userRoles = [];
    protected $listeners = ['selectedRole'];

    protected function getRules()
    {
        $rules = ($this->action == "updateUser") ? [
            'user.email' => 'required|email|unique:users,email,' . $this->userId
        ] : [
            'user.password' => 'required|min:8|confirmed',
            'user.password_confirmation' => 'required' // livewire need this
        ];

        return array_merge([
            'user.name' => 'required|min:3',
            'user.email' => 'required|email|unique:users,email',
        ], $rules);
    }

    public function hydrate()
    {
        $this->emit('loadSelect2Hydrate');
    }

    public function selectedRole($value)
    {
        $this->selectedRoles =  $value;
        //  dd($this->selectedRoles);
    }

    public function createUser()
    {
        $this->resetErrorBag();
        $this->validate();

        $password = $this->user['password'];

        if (!empty($password)) {
            $this->user['password'] = Hash::make($password);
        }

        $user =  User::create($this->user);
        $user->assignRole($this->selectedRoles);

        $this->emit('saved');
        $this->reset('user');
        return redirect()->route('users.index');
    }

    public function updateUser()
    {

       // dd($this->user);

        $this->resetErrorBag();
        $this->validate();

        $user =    User::find($this->userId);
        $user->assignRole($this->selectedRoles);
        $user->update([
            "name" => $this->user->name,
            "email" => $this->user->email,
        ]);

        $this->emit('saved');
        return redirect()->route('users.index');
    }

    public function mount()
    {
        if (!$this->user && $this->userId) {
            $this->user = User::find($this->userId);
            // $this->userRoles =  $this->user->roles->pluck('name', 'name')->all();
            //$this->selectedRoles =  $this->userRoles;
        }

        $this->rolesList = Role::get()->toArray();
        $this->button = create_button($this->action, "User");
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
