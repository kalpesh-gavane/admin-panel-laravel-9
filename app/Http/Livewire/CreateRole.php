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
            'role.name' => 'required|string',
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
    }

    public function updateRole()
    {
        $this->resetErrorBag();
        $this->validate();

        Role::find($this->roleId)->update([
            "name" => $this->role->name,
            "guard_name" => $this->role->guard_name,
        ]);

        $this->emit('saved');
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
