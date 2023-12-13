<?php

namespace App\Livewire\Dashboard\GestionUsuarios;

use App\Models\DataUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ModalCreateUser extends Component
{
    public $modalOpen = false;
    public $mensaje;


    #[Rule('string')]
    public $tipo_dni;

    #[Rule('numeric|regex:/^[0-9]{1,15}$/|unique:data_users,dni_user')]
    public $dni_user;

    #[Rule('string|max:30')]
    public $name;

    #[Rule('string|max:30')]
    public $last_name;

    #[Rule('string')]
    public $gender;

    #[Rule('date')]
    public $birthdate;

    #[Rule('numeric|regex:/^[0-9]{1,13}$/')]
    public $cell;

    #[Rule('string')]
    public $direccion;

    #[Rule('required|email|unique:users,email')]
    public $email;

    #[Rule('string|min:8|max:20')]
    public $password;




    public function mount()
    {
        $this->tipo_dni = 'DNI';
        $this->dni_user = '';
        $this->name = '';
        $this->last_name = '';
        $this->gender = '';
        $this->birthdate = '';
        $this->cell = '';
        $this->direccion = '';
        $this->email = '';
        $this->password = '';
    }

    public function save()
    {


        $this->validate();

        // Crear un nuevo usuario
        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'password' => $this->password,
        ]);


        // Obtener el id del usuario recién creado
        $user_id = $user->id;

        // Asignar rol por defecto Asistente
        $rol = Role::where('name', 'Asistente')->first();
        if ($rol) {
            // Obtener el usuario completo (no solo su ID)
            $user = User::find($user_id);
            // Asignar el rol al usuario
            $user->syncRoles($rol);
        } else {
            // Manejar el caso en el que no se encuentre el rol
            // Puede mostrar un mensaje de error o tomar otra acción apropiada.
        }

        // Guardar los datos del usuario adicional en la tabla data_users
        if (!empty($this->dni_user)) {
            $datausers = new DataUser;
            $datausers->dni_user  = $this->dni_user;
            $datausers->tipo_dni = $this->tipo_dni;
            $datausers->gender = $this->gender;
            $datausers->birthdate = $this->birthdate;
            $datausers->cell = $this->cell;
            $datausers->direccion = $this->direccion;
            $datausers->tipo_dni = $this->tipo_dni;

            // Asignar el id del usuario recién creado a la columna user_id
            $datausers->user_id  = $user_id;
            
            $datausers->save();
        }


        session()->flash('message', 'Nuevo correo registrado exitosaente');

        $this->modalOpen = false;
        $this->dispatch('update-tabla-usuarios');
    }


    #[On('show-modal-create')]
    public function openModal()
    {
        $this->modalOpen = true;
    }
    #[On('close-modal')]
    public function closeModal()
    {
        $this->modalOpen = false;
    }


    public function render()
    {
        return view('livewire.dashboard.gestion-usuarios.modal-create-user');
    }
}
