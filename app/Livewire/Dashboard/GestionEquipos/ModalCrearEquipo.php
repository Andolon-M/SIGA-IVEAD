<?php

namespace App\Livewire\Dashboard\GestionEquipos;

use App\Models\User;
use App\Models\WorkTeam;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class ModalCrearEquipo extends Component
{
    use WithPagination;
   
    public $modalopen = false;

    public $name = '';

    #[Rule('unique:work_teams,user_id')]
    public $id_lider = null;

    public $name_lider = null;
    public $dni_lider = null;
    public $cell_lider = null;
    public $searchlider = null;


    #[On('show-modal-create')]
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
    #[On('asignar_lider')]
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
    }
    #[On('cambiar_lider')]
    public function cambiarLider()
    {
        #dd($id);

        $this->id_lider = null;
    }

    public  function save()
    {
        $this->validate();
        $team = WorkTeam::create([
            'name' => $this->name,
            'user_id' => $this->id_lider,
        ]);


        session()->flash('message', 'Nuevo correo registrado exitosaente');
        $this->reset();
        $this->dispatch('update-lista-equipos');
        $this->modalopen = false;

    }
    public function updatingSearchlider() #actualiza la tabla paginacion de la tabla al momento de hacer una busqueda
    {
/*
        $this->users = User::where(
            fn ($query) =>
            $query->where('name', 'like', "$this->searchlider%")
                ->orWhere('last_name', 'like', "$this->searchlider%")
    
        )->orWhereHas('data_users', function ($query) {
            $query->where('dni_user', 'like', "$this->searchlider%");
        })->get();
       */

    }

public function mount()
{
}


    public function render()
    {
        $users = User::where(
            fn ($query) =>
            $query->where('name', 'like', "$this->searchlider%")
                ->orWhere('last_name', 'like', "$this->searchlider%")
    
        )->orWhereHas('data_users', function ($query) {
            $query->where('dni_user', 'like', "$this->searchlider%");
        })->paginate(3);

    return view('livewire.dashboard.gestion-equipos.modal-crear-equipo', ['users'=>  $users]);
    }
}
