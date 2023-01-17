<?php

namespace App\Traits;


trait WithDataTable
{

    public function get_pagination_data()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('users.create'),
                            'create_new_text' => 'Create New User',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;
            case 'role':
                $roles = $this->model::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.roles',
                    "roles" => $roles,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('roles.create'),
                            'create_new_text' => 'Create Role',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
                break;

            default:
                # code...
                break;
        }
    }
}
