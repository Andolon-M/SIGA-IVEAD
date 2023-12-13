<?php

namespace App\Livewire\Dashboard\RolesYPermisos;

use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public $modalopen = false;
    #[Rule('required|string')]
    public $name_rol;

    #[On('show_modal_create')]
    public function openModal()
    {
        $this->modalopen = true;
    }
    #[On('close-modal')]
    public function closeModal()
    {
        $this->modalopen = false;
        $this->reset();
    }
 
    public  function save()
    {
        $this->validate();
        $team = Role::create([
            'name' => $this->name_rol,
        ]);


        session()->flash('message', 'Nuevo rol registrado exitosaente');
        $this->reset();
        $this->dispatch('update_table_roles');
        $this->modalopen = false;

    }

    public function render()
    {
        return view('livewire.dashboard.roles-y-permisos.create-role');
    }
}
