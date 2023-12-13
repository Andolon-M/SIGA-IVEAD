<?php

namespace App\Livewire\Dashboard\GestionRecursos;

use App\Models\Resource;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ModalEditRecurso extends Component
{
    use WithFileUploads;    
    public $modalopen;
    public $id;
    public $nombre;
    public $tipo_recurso;
    public $descripcion;
    public $url;
    public $url_iframe;
    public $archivo;



    #[On('show_modal_edit_recurso')]
    public function openModal($id)
    {
        $recurso = Resource::find($id);
        $this->id = $recurso->id;
        $this->nombre = $recurso->nombre ?? null;
        $this->tipo_recurso = $recurso->tipo ?? null;
        $this->descripcion = $recurso->descripcion ?? null;
        $this->url = $recurso->url ?? null;
        $this->url_iframe = $recurso->url_iframe ?? null;
        $this->archivo = $recurso->archivo ?? null;

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
        $recurso = Resource::updateOrCreate(['id' => $this->id,]);

        $recurso->nombre = $this->nombre;
        $recurso->tipo = $this->tipo_recurso;
        $recurso->descripcion = $this->descripcion;
        $recurso->url = $this->url;
        $recurso->url_iframe = $this->url_iframe;
        $recurso->archivo = $this->archivo;
        $recurso->save();
        session()->flash('message', 'Nuevo correo registrado exitosaente');

        $this->modalopen = false;
        $this->dispatch('update-lista-recursos')->to(GestionRecursos::class);
        $this->reset();
    }
    

    public function render()
    {
        return view('livewire.dashboard.gestion-recursos.modal-edit-recurso');
    }
}
