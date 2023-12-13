<!-- Edit Modal -->
@can('Editar Usuarios')
<div id="#{{$User->id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <h2 class="text-2xl font-medium text-gray-900 dark:text-white">
                    Editar Usuario
                </h2>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="#{{$User->id}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6 flex items-center justify-center">
                {!! Form::model($User, ['method' => 'patch', 'route' => ['usuarios.update', $User->id]]) !!}
                <div class="flex flex-wrap sm:flex-no-wrap">
                    <div class="shadow-2xl mx-2 my-2 rounded-lg p-2 bg-white dark:bg-gray-800 ">
                        <div class="mb-6 col-sm-8 hidden">
                            <!-- Numero de documento -->
                            {!! Form::label('id', 'ID', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) !!}
                            {!! Form::number('id', $User->id ?? null, ['id' => 'id', 'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light', 'placeholder' => '1234567891', 'required', 'disabled' => 'disabled']) !!}
                        </div>
                        <div class="mb-6 col-sm-8 hidden">
                            <!-- Numero de documento -->
                            {!! Form::label('id', 'User_ID (Data User)', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) !!}
                            {!! Form::number('id', $User->data_users->first()->user_id ?? null, ['id' => 'id', 'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light', 'placeholder' => '1234567891', 'required', 'disabled' => 'disabled']) !!}
                        </div>
                        <h4 class="text-lg font-medium text-green-900 dark:text-white mb-5">
                            Datos personales
                        </h4>
                        <div class="grid grid-cols-2 space-x-2">
                            <div class="mb-6 col-sm-4">
                                <!-- Tipo de documento -->
                                {!! Form::label('tipo_dni', 'Tipo de documento', ['class' => 'block mb-2 text-sm font-medium text-green-900 dark:text-gray-300']) !!}
                                {!! Form::select('tipo_dni', ['TI' => 'Tarjeta de identidad', 'CC' => 'Cedula de ciudadania', 'Otro' => 'Otro'], $User->data_users->first()->tipo_dni ?? null, ['id' => 'tipo_dni', 'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light', 'required']) !!}
                            </div>

                            <div class="mb-6 col-sm-8">
                                <!-- Numero de documento -->
                                {!! Form::label('dni_user', 'Numero de documento', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                                {!! Form::number('dni_user', $User->data_users->first()->dni_user ?? null, ['id' => 'dni_user', 'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light', 'placeholder' => '1234567891', 'required']) !!}
                            </div>
                        </div>
                        <div class="grid grid-cols-2 space-x-2">
                            <div class="mb-6">
                                <!-- Nombre -->
                                {!! Form::label('name', 'Nombre', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                                {!! Form::text('name', $User->name ?? null, ['id' => 'name', 'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light', 'placeholder' => 'Ingrese el nombre aqui', 'required']) !!}
                            </div>
                            <div class="mb-6">
                                <!-- Apellido -->
                                {!! Form::label('last_name', 'Apellido', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                                {!! Form::text('last_name', $User->last_name ?? null, ['id' => 'last_name', 'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light', 'placeholder' => 'name@flowbite.com', 'required']) !!}
                            </div>
                        </div>
                        <div class="mb-6 col-sm-4">
                            <!-- Genero -->
                            {!! Form::label('gender', 'Genero', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                            {!! Form::select('gender', ['Masculino' => 'Masculino', 'Femenino' => 'Femenino'], $User->data_users->first()->gender ?? null, ['id' => 'gender', 'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light', 'required']) !!}
                        </div>
                        <div class="mb-6">
                            <!-- Fecha de nacimiento -->
                            {!! Form::label('birthdate', 'Fecha de nacimiento', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300']) !!}
                            {!! Form::date('birthdate', $User->data_users->first()->birthdate ?? null, ['id' => 'birthdate', 'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light', 'placeholder' => 'name@ivead.com', 'required']) !!}
                        </div>
                    </div>

                    <div class="ml-4 mt-4 shadow-2xl rounded-lg p-2 bg-white dark:bg-gray-800">
                        <h4 class="text-lg font-medium text-green-900 dark:text-white mb-5">
                            Informacion de contacto
                        </h4>
                        <div class="grid grid-cols-2 space-x-2">
                            <div class="mb-6">
                                <!-- Numero telefonico -->
                                {!! Form::label('cell', 'Numero telefonico', ['class' => 'block mb-2 text-sm font-medium text-green-900 dark:text-white']) !!}
                                {!! Form::text('cell', $User->data_users->first()->cell ?? null, ['id' => 'cell', 'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light', 'placeholder' => '+573015555555', 'required']) !!}
                            </div>
                            <div class="mb-6">
                                <!-- Direccion de residencia -->
                                {!! Form::label('direccion', 'Direccion de residencia', ['class' => 'block mb-2 text-sm font-medium text-green-900 dark:text-white']) !!}
                                {!! Form::text('direccion', $User->data_users->first()->direccion ?? null, ['id' => 'residencia', 'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 dark:shadow-sm-light', 'placeholder' => '+573015555555', 'required']) !!}
                            </div>
                        </div>
                        <h4 class="text-lg font-medium text-green-900 dark:text-white mb-5">
                            Informacion de acceso
                        </h4>
                        <div class="mb-6">
                            <!-- Correo (Email) -->
                            {!! Form::label('email', 'Correo (Email)', ['class' => 'block mb-2 text-sm font-medium text-green-900 dark:text-white']) !!}
                            {!! Form::email('email', $User->email ?? null, ['id' => 'email', 'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-700 dark:focus:border-green-700 dark:shadow-sm-light', 'placeholder' => 'Ingrese el correo', 'required']) !!}
                        </div>
                        <div class="mb-6">
                            <!-- Contraseña -->
                            {!! Form::label('password', 'Contraseña', ['class' => 'block mb-2 text-sm font-medium text-green-900 dark:text-white']) !!}
                            {!! Form::password('password', ['id' => 'password', 'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-700 dark:focus:border-green-700 dark:shadow-sm-light', 'placeholder' => 'Ingrese la contraseña']) !!}
                        </div>
                        <ul class="w-48 text-sm font-medium text-green-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            @foreach ($roles as $role)
                            <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                <div class="flex items-center pl-3">
                                    {!! Form::checkbox('roles[]', $role->name, in_array($role->name, $userRoles->toArray()), ['class' => 'w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500']) !!}
                                    <label for="{{ $role->name }}" class="w-full py-3 ml-2 text-sm font-medium text-green-900 dark:text-gray-300">{{ $role->name }}</label>
                                </div>
                            </li>
                            @endforeach



                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                {{ Form::button('<i class="fa fa-check-square-o"></i> Actualizar', ['class' => 'text-white bg-green-700 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800', 'type' => 'submit']) }}
                {!! Form::close() !!}
                <button data-modal-hide="#{{$User->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>
@endcan
@can('Eliminar Usuarios')

<!--modal delete-->
<div id="#delete{{$User->id}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!--modal header-->
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="#delete{{$User->id}}">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!--modal body-->
            {!! Form::model($User, [ 'method' => 'delete','route' => ['usuarios.destroy', $User->id] ]) !!}
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <div class="col">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Esta seguro que desea borrar este usuario?<br> {{$user->name ?? null}} {{$user->last_name ?? null}} ( {{$User->data_users->first()->tipo_dni ?? null}}: {{$User->data_users->first()->dni_user ?? null}} ) <br> </h3>
                    <p1 class="mb-5 text-sm font-normal text-gray-500 dark:text-gray-400">Esta accion no se podra revertir <br></p1>
                    <!-- modal footer-->
                    {{ Form::button('Si, estoy seguro', ['class' => 'bg-red-600 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm text-white inline-flex items-center px-5 py-2.5 text-center mr-2', 'type' => 'submit']) }}
                    {!! Form::close() !!}
                    <button data-modal-hide="#delete{{$User->id}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endcan