<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\DataUser;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
class UsuarioController extends Controller
{
    
    public function __construct()
{
    $this->middleware(['permission:Gestion Usuarios|Roles y Permisos']);
}

    public function index()
    {
        $users = User::orderBy('last_name', 'asc')->paginate(10);

        return view('dashboard.gestion_usuarios.gestion_usuarios')->with('users', $users);
        
    }
    public function getUsuarios()
    {
        $users = User::all();

        return view('dashboard.gestion_usuarios.gestion_usuarios.php')->with('users', $users);
    }

    public function save(Request $request)
    {

        $users = new User;
        $users->name = $request->input('name');
        if (!empty($request->input('last_name'))) {
            $users->last_name = $request->input('last_name');
        } else {
            $users->last_name = 'null';
        }
        $users->email = $request->input('email');
        $users->password = $request->input('password');
        $users->save();

        // Obtener el id del usuario recién creado

        if (!empty($request->input('dni_user'))) {
            $user_id = $users->id;
            $datausers = new DataUser;
            $datausers->dni_user  = $request->input('dni_user');
            $datausers->tipo_dni = $request->input('tipo_dni');
            $datausers->gender = $request->input('gender');
            $datausers->birthdate = $request->input('birthdate');
            $datausers->cell = $request->input('cell');
            $datausers->direccion = $request->input('direccion');
            $datausers->tipo_dni = $request->input('tipo_dni');

            // Asignar el id del usuario recién creado a la columna user_id
            $datausers->user_id  = $user_id;
            $datausers->save();
        }
        return redirect('usuarios');
    }


    public function update(Request $request, $id)
    {
       # dd($request, $id);
        // Llenar los campos con los datos del formulario y guardar el registro en la base de datos
        // Especificar qué datos del formulario deben asignarse a la tabla users
        $user = User::find($id);
        $input = $request->all();
        
        $user->name = $input['name'];
        $user->last_name = $input['last_name'];
        $user->email  = $input['email'];
        $user->password = $input['password'];
        $user->syncRoles($request->input('roles'));
       

        $user->save();

        // Actualizar el registro de la tabla data_users
        // Buscar un registro existente en data_users o crear uno nuevo
        $data_users = DataUser::firstOrNew(['user_id' => $user->id]);

        // Llenar los campos con los datos del formulario y guardar el registro en la base de datos
        // Especificar qué datos del formulario deben asignarse a la tabla data_users
        $data_users->dni_user = $input['dni_user'];
        $data_users->tipo_dni = $input['tipo_dni'];
        $data_users->birthdate = $input['birthdate'];
        $data_users->gender = $input['gender'];
        $data_users->cell = $input['cell'];
        $data_users->direccion = $input['direccion'];
        $data_users->user_id  = $user->id;


        // Guardar el registro en la base de datos
        $data_users->save();

        return redirect()->route('usuarios.edit', encrypt($user->id));

    }

    public function edit($idEncriptado)
{
    $id = decrypt($idEncriptado);
    $User = User::find($id);
    $userRoles = $User->getRoleNames(); // Obtener los nombres de los roles del usuario
    $roles = Role::all(); // Obtener todos los roles disponibles

    return view('dashboard.gestion_usuarios.editar_usuario', compact('User', 'userRoles', 'roles'));
}



    public function destroy ($id)
    {
       # dd($id);
        $users = User::find($id);
        $users->delete();

        return redirect('usuarios');
    }
}
