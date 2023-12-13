<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creacion de los permisos para cada funcion en la base de datos
        $permissions = [
            'Gestion Usuarios', 'Crear Usuarios', 'Editar Usuarios', 'Eliminar Usuarios',
            'Roles y Permisos', 'Crear Roles', 'Eliminar Roles', 'Editar Roles',
            'Gestion Equipos', 'Crear Equipos', 'Editar Equipos', 'Eliminar Equipos',
            'Gestion Recursos', 'Crear Recursos', 'Editar Recursos', 'Eliminar Recursos',
            'Gestion Eventos', 'Crear Eventos', 'Editar Eventos', 'Eliminar Eventos',
            'Gestion Privilegios', 'Crear Privilegios', 'Editar Privilegios', 'Eliminar Privilegios',
            'Gestion Financiera',
        ];
        //proceso que guarda los permisos en la base de datos
        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
        }

        // proceso para buscar o crear un nuevo rol llamado Administrador
        $adminRole = Role::where('name', '=', 'Administrador')->first();

        if (!$adminRole) {
            $adminRole = Role::create(['name' => 'Administrador']);
        }

        $adminRole->syncPermissions($permissions); // se aignan todos los permisos al rol Administrador

        $admin = User::where('name', '=', 'admin')->first(); // se busca al usuario por defecto llamado admin
        $admin->assignRole($adminRole); // se asigna el rol administrador al usuario llamado admin
    }
}
