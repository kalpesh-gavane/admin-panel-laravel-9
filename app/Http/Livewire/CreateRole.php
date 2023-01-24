<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public $role;
    public $roleId;
    public $action;
    public $button;

    protected function getRules()
    {
        $rules = [
            'role.name' => ($this->action == "createRole") ? ['required|unique:roles,name'] : ['required'],
            'role.guard_name' => 'required|string',
        ];
        return  $rules;
    }

    public function createRole()
    {
        $this->resetErrorBag();
        $this->validate();

        Role::create($this->role);

        $this->emit('saved');
        $this->reset('role');
        return redirect()->to(route('roles.index'));
    }

    public function updateRole()
    {
        $this->resetErrorBag();
        $this->validate();

        Role::find($this->roleId)->update($this->role->toArray());
        $this->emit('saved');
        return redirect()->to(route('roles.index'));
    }

    public function mount()
    {

        if (!$this->role && $this->roleId) {
            $this->role = Role::find($this->roleId);
        }

        $this->button = create_button($this->action, "Role");
    }

    public function render()
    {
        return view('livewire.create-role');
    }
}
