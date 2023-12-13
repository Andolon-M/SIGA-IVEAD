<?php

namespace App\Livewire\Dashboard\GestionRecursos;

use App\Models\Resource;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalDeleteRecurso extends Component
{
    public $modalopen = false;
    public $name;
    public $id_recurso;


    #[On('show_modal_delete_team')]
    public function openModal($id)
    {
        $team = Resource::find($id);
        $this->id_recurso= $team->id;
        $this->name = $team->nombre;
        $this->modalopen = true;
    }
    #[On('close-modal_delete')]
    public function closeModal()
    {
        $this->modalopen = false;
        $this->reset();
    }

    #[On('delete_team')]
    public function deleteTeam()
    {
       
        $recurso = Resource::find($this->id_recurso); // Donde $id es el ID del usuario que deseas eliminar

        if ($recurso) {
            $recurso->delete();
            // El registro del usuario ha sido eliminado correctamente.
        } else {
            // Maneja el caso en el que el usuario no se encuentra en la base de datos.
        }
        $this->modalopen = false;
        $this->reset();
        $this->dispatch('update-lista-recursos')->to(GestionRecursos::class);


    }

    public function render()
    {
        return view('livewire.dashboard.gestion-recursos.modal-delete-recurso');
    }
}
