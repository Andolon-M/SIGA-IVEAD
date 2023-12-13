<?php

namespace App\Livewire\Dashboard\RolesYPermisos;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class IndexLive extends Component
{
    public $roles;
    public $search;

    #[On('update_table_roles')]
    public function render()
    {
        $this->roles = Role::all();
        return view('livewire.dashboard.roles-y-permisos.index-live', ['roles'=>$this->roles]);
    }
}
