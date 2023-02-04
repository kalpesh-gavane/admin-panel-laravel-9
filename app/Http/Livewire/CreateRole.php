<?php

namespace App\Http\Livewire;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Log;
use Livewire\{Component};
use Spatie\Permission\Models\{Permission, Role};

class CreateRole extends Component
{
    public $role, $roleId, $action, $button, $permissions, $selectedPermissions = [], $rolePermissions = [];
    protected $listeners = ['selectedItem'];

    protected function getRules()
    {
        $rules = ($this->action == "updateRole") ? [
            'role.name' => 'required|unique:roles,name,' . $this->roleId
        ] : [
            'role.name' => 'required|unique:roles',
        ];

        return array_merge([
            'role.guard_name' => 'required',
        ], $rules);
    }

    public function hydrate()
    {
        $this->emit('loadSelect2Hydrate');
    }

    public function selectedItem($value)
    {
        //$this->permissions = Permission::toBase()->get();
        $this->selectedPermissions =  $value;
        //dd($value);
    }

    public function createRole()
    {
        //    Log::alert($this->selectedPermissions);
        //    Log::alert($this->role);

        // $this->resetErrorBag();
        // $this->validate();

        $role = Role::create($this->role);
        $role->syncPermissions($this->selectedPermissions);

        $this->emit('saved');
        $this->reset('role');
        return redirect()->to(route('roles.index'));
    }

    public function updateRole()
    {
        $this->resetErrorBag();
        $this->validate();

        //dd($this->selectedPermissions);

        $role =  Role::find($this->roleId);
        $role->syncPermissions($this->selectedPermissions);
        $role->update($this->role->toArray());
        
        $this->emit('saved');
        return redirect()->to(route('roles.index'));
    }

    public function mount()
    {

        if (!$this->role && $this->roleId) {
            $this->role = Role::find($this->roleId);
            $this->rolePermissions =  $this->role->permissions->pluck('name')->toArray();
            $this->selectedPermissions =  $this->rolePermissions;
        }

        $this->permissions = Permission::get();
        $this->button = create_button($this->action, "Role");
    }

    public function render()
    {
        return view('livewire.create-role');
    }
}
