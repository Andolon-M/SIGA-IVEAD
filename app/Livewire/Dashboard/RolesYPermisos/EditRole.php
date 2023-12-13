<?php

namespace App\Livewire\Dashboard\RolesYPermisos;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditRole extends Component
{
    public $modalopen;
    public $rol;
    public $id_rol;
    public $name_rol;
    public $selectedPermissions = [];


    #[On('show_modal_edit')]
    public function openModal($id)
    {
        $rol = Role::find($id);
        $this->rol = $rol;
        $this->id_rol = $rol->id;
        $this->name_rol = $rol->name;
        #dd($this->id_rol, $this->name_rol);
        $this->dispatch('update_render')->self();
        $this->modalopen = true;
    }
    #[On('close-modal')]
    public function closeModal()
    {
        $this->modalopen = false;
        $this->reset();
    }

    #[On('asignar_permiso')]
    public function asignarPermiso($id)
    {
        // Obtener el modelo de rol por su ID
        $rol = Role::find($this->id_rol);

        if ($rol) {
            // Asignar el permiso al rol
            $rol->givePermissionTo($id);

            // Cerrar el modal u realizar otras acciones según sea necesario
            $this->dispatch('update_render')->self();
        } else {
            // Manejar el caso en el que no se encuentre el rol
            // Puede mostrar un mensaje de error o tomar otra acción apropiada.
        }
    }
    #[On('quitar_permiso')]
    public function quitarPermiso($id)
    {
        // Obtener el modelo de rol por su ID
        $rol = Role::find($this->id_rol);

        if ($rol) {
            // Revocar el permiso del rol
            $rol->revokePermissionTo($id);

            // Cerrar el modal u realizar otras acciones según sea necesario
            $this->dispatch('update_render')->self();
        } else {
            // Manejar el caso en el que no se encuentre el rol
            // Puede mostrar un mensaje de error o tomar otra acción apropiada.
        }
    }


    public function save()
    {
        $role = Role::find($this->id_rol);
    
        if ($role) {
            $role->name = $this->name_rol; // Asigna el nuevo nombre al rol
            $role->save(); // Guarda los cambios en la base de datos
            $this->dispatch('update_table_roles');
            $this->dispatch('close-modal')->self();
        }
    }
    

    #[On('update_render')]
    public function render()
    {
        $permisos = Permission::all();
        return view('livewire.dashboard.roles-y-permisos.edit-role', ['permisos' => $permisos]);
    }
}
