<?php

namespace App\Livewire\Dashboard\GestionEquipos;

use App\Models\WorkTeam;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListadoEquipos extends Component
{
    use WithPagination;


    public function mount()
    {
    }

   
    #[On('update-lista-equipos')]
    public function render()
    {
        $teams = WorkTeam::orderBy('id', 'desc')->paginate(4);
        return view('livewire.dashboard.gestion-equipos.listado-equipos', ['teams' => $teams]);
    }
}
