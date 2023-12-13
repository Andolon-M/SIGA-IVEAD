<?php

namespace App\Livewire\Dashboard\GestionRecursos;

use App\Models\Resource;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class GestionRecursos extends Component
{
    use WithPagination;

    public function mount()
    {
       
    }
    #[On('update-lista-recursos')]
    public function render()
    {
        $resources = Resource::orderBy('id', 'desc')->paginate(6);
        return view('livewire.dashboard.gestion-recursos.gestion-recursos',['resources'=>$resources]);
    }
}
