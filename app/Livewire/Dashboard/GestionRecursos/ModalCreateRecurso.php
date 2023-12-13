<?php

namespace App\Livewire\Dashboard\GestionRecursos;

use App\Models\Resource;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ModalCreateRecurso extends Component
{
    use WithFileUploads;    
    public $modalopen;
    public $nombre;
    public $tipo_recurso;
    public $descripcion;
    public $url;
    public $url_iframe;
    public $archivo;


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

    public function save()
    {
        $recurso = Resource::updateOrCreate(
            ['nombre' => $this->nombre ?? null ,
            'tipo' => $this->tipo_recurso ?? null,
            'descripcion' => $this->descripcion ?? null,
            'url' => $this->url ?? null,
            'url_iframe' => $this->url_iframe ?? null,
            'archivo' => $this->archivo ?? null,
        ]);
        session()->flash('message', 'Nuevo correo registrado exitosaente');

        $this->modalopen = false;
        $this->dispatch('update-lista-recursos')->to(GestionRecursos::class);
        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.dashboard.gestion-recursos.modal-create-recurso');
    }
}
