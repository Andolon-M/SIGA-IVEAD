<?php

namespace App\Livewire\Dashboard\GestionEquipos;

use App\Models\TeamMember;
use App\Models\User;
use App\Models\WorkTeam;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ModalAgregarMiembro extends Component
{
    use WithPagination;

    public $team;
    public $name;
    public $id;

    #[Rule('required')]
    public $id_lider;

    public $name_lider;
    public $dni_lider;
    public $cell_lider;
    public $modalopen = false;
    public $search = null;


    #[On('show_modal_add_member')]
    public function openModal($id)
    {
        #dd($id);
        $team = WorkTeam::find($id);

        $this->team = $team ?? null;
        $this->name = $team->name ?? null;
        $this->id = $team->id ?? null;
        $this->id_lider = $team->user_id ?? null;

        $this->name_lider = $team->perteneceUser->name ?? null;
        if ($team->perteneceUser->data_users) {
            $primerDataUser = $team->perteneceUser->data_users->first();
            if ($primerDataUser) {
                $this->dni_lider = ($primerDataUser->tipo_dni ?? null) . ': ' . ($primerDataUser->dni_user ?? null);
                $this->cell_lider = ($primerDataUser->cell ?? null) ;
            }
        }

        # dd($this->dni_lider);
        $this->modalopen = true;
    }

    #[On('Cambiar_lider')]
    public function cambiarLider()
    {
        #dd($id);

        $this->id_lider = null;
    }
    #[On('Asignar_lider')]
    public function asignarLider($id)
    {
        #dd($id);
        $lider = User::where('id', $id)->first();
        #dd($lider);
        $this->id_lider = $lider->id;
        $this->name_lider = ($lider->name ?? null) . ' ' . ($lider->last_name ?? null);

        $primerDataUser = $lider->data_users->first();
        $this->dni_lider = $primerDataUser ? ($primerDataUser->tipo_dni ?? null) . ': ' . ($primerDataUser->dni_user ?? null) : null;
        $this->cell_lider = $primerDataUser ? $primerDataUser->cell ?? null : null;
        $this->reset('search');
    }

    #[On('quitar_miembro')]
    public function quitarMiembro($id)
    {
       # dd($id);
        $membrecia = TeamMember::find($id);

        if ($membrecia) {
            $membrecia->delete();
            $this->dispatch('update_lista_miembros')->self();
            $this->dispatch('update-lista-equipos');
            // El registro ha sido eliminado exitosamente
        } else {
            // El registro no se encontró
        }


        
    }
    #[On('asignar_miembro')]
    public function asignarMiembro($id)
    {
        #dd($this->id);
        $member = TeamMember::firstOrNew([
            'work_teams_id' => $this->id ?? null,
            'user_id' => $id ?? null,
        ]);

        // Si no se encontró un registro existente con las mismas condiciones, lo crearemos
        if (!$member->exists) {
            $member->save();
        }

        // Luego, puedes continuar con otras acciones, si es necesario
        $this->reset('search');
        $this->dispatch('update-lista-equipos');
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
        #dd($this->name);
        $team = WorkTeam::updateOrCreate(['id' => $this->id,]);

        $team->name = $this->name;
        $team->user_id = $this->id_lider;
        $team->save();

        session()->flash('message', 'Nuevo correo registrado exitosaente');
        $this->modalopen = false;


        $this->dispatch('update-lista-equipos')->To(ListadoEquipos::class);
    }
    #[On('close-update_lista_miembros')]
    public function render()
    {
        $users = User::where(
            fn ($query) =>
            $query->where('name', 'like', "$this->search%")
                ->orWhere('last_name', 'like', "$this->search%")

        )->orWhereHas('data_users', function ($query) {
            $query->where('dni_user', 'like', "$this->search%");
        })->paginate(4);
        return view('livewire.dashboard.gestion-equipos.modal-agregar-miembro', ['users' => $users]);
    }
}
