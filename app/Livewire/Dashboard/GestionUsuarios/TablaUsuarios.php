<?php

namespace App\Livewire\Dashboard\GestionUsuarios;



use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class TablaUsuarios extends Component
{
    use WithPagination;

    #declaracion de variables publicas
    public $newUserEmail;
    public $page;
    public $search;
    public  $numpaginate;
    

    #funcion mount
    public function mount()
    {
        $this->numpaginate = 5; //establice el valor inicial de la paginacion en 5 
    }

    public function updated()
    {
        // Realiza cualquier actualización que necesites después de que el componente se haya inicializado.
    }

    public function detach()
    {
        // Libera cualquier recurso que esté utilizando el componente.
    }

    public function updatingSearch() #actualiza la tabla paginacion de la tabla al momento de hacer una busqueda
    {        
        $this->dispatch('update-tabla-usuarios')->self();//evento para actualizar la tabla mediante el metodo render
        $this->resetPage();//refresca la paginacion
    }
    public function updatingNumpaginate() #actualiza la tabla paginacion de la tabla al momento de hacer una busqueda
    {
        $this->dispatch('update-tabla-usuarios')->self();//evento para actualizar la tabla mediante el metodo render
        $this->resetPage();//refresca la paginacion
    }

    #[On('update-tabla-usuarios')] #escuchando si se necesita actualizar la tabla
    public function render() #busca la informacion de los usuarios en la base de datos, filtra y ordena la tabla
    {       
        $users = User::orderBy('id', 'desc')
            ->where(
                fn ($query) =>
                $query->where('name', 'like', "$this->search%")
                    ->orWhere('last_name', 'like', "$this->search%")
                    
            )->orWhereHas('data_users', function ($query) {
                $query->where('dni_user', 'like', "$this->search%");
            })
            ->paginate($this->numpaginate);      
        return view('livewire.dashboard.gestion-usuarios.tabla-usuarios', ['users' => $users]);
    }
}
