<?php

namespace App\Livewire\Dashboard\GestionEquipos;

use App\Models\WorkTeam;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalDeleteTeam extends Component
{
    public $modalopen = false;
    public $name;
    public $id_team;


    #[On('show_modal_delete_team')]
    public function openModal($id)
    {
        $team = WorkTeam::find($id);
        $this->id_team= $team->id;
        $this->name = $team->name;
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
       
        $team = WorkTeam::find($this->id_team); // Donde $id es el ID del usuario que deseas eliminar

        if ($team) {
            $team->delete();
            // El registro del usuario ha sido eliminado correctamente.
        } else {
            // Maneja el caso en el que el usuario no se encuentra en la base de datos.
        }
        $this->modalopen = false;
        $this->reset();
        $this->dispatch('update-lista-equipos');


    }

    public function render()
    {
        return view('livewire.dashboard.gestion-equipos.modal-delete-team');
    }
}
