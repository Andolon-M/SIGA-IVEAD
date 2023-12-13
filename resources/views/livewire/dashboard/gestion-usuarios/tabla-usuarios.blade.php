<div>
    @livewire('Dashboard.GestionUsuarios.ModalCreateUser')

    <!-- Header tabla -->
    <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-800 p-1 flex-wrap">
        <div class="flex flex-wrap">
            <!-- Boton para desplegar el menú de acciones masivas -->
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-green-300 focus:outline-none hover:bg-gray-100 focus:ring-2 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-100 dark:border-green-600 dark:hover:bg-green-900 dark:hover:border-green-600 dark:focus:ring-green-900" type="button">
                <span class="sr-only">Action button</span>
                Action
                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <!-- Dropdown menu acciones masivas -->
            <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <a href="usuarios" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Recargar</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Eliminar</a>
                    </li>
                </ul>
            </div>
            @can('Crear Usuarios')
            <!-- Botón para abrir el modal de crear usuario -->
            <a wire:click="$dispatch('show-modal-create')" class="cursor-pointer sm:w-auto text-white bg-green-700 hover:bg-green-900 dark:bg-gray-800 dark:hover:bg-green-900 border border-green-600 dark:focus:ring-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-2 py-2.5 m-1 text-center">
                <div class="flex items-center">
                    <svg class="w-4 h-4 text-white dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z" />
                    </svg>
                    Nuevo usuario
                </div>
            </a>
            @endcan
            <!-- Spinner de carga -->
            <div wire:loading class="mt-2 ml-1">
                <div role="status" class="">
                    <svg aria-hidden="true" class="inline w-10 h-10 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-green-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        <!-- Inicio campo de búsqueda -->
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative my-2">
            <!-- Icono de buscar -->
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <!-- Campo de búsqueda -->
            <input wire:model.live.debounce.700ms="search" type="text" id="table-search-users" class="block p-2 pl-10 text-sm text-gray-900 border border-green-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar Usuarios">
        </div>
    </div>

    <label for="countries" class="block mx-2 mt-1 text-sm font-medium text-green-900 dark:text-white">Número de resultados</label>
    <select id="countries" wire:model.live="numpaginate" class="mx-2 sm rounded-full border-green-300 text-green-900 text-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
        <option value="5" selected>5</option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
    </select>

    <!-- Inicio tabla -->
    <table class="w-full text-sm text-left text-green-800 dark:text-white dark:bg-gray-700 my-4">
        <!-- Header tabla -->
        <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-900 dark:text-gray-300">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-3 py-3">
                    NOMBRE / EMAIL
                    <p>toque un nombre para ver, editar o eliminar</p>
                </th>
                <th scope="col" class="px-3 py-3 hidden md:table-cell"> <!-- Esta celda se mostrará en pantallas de tamaño "md" o mayores -->
                    IDENTIFICACIÓN
                </th>
                <th scope="col" class="px-3 py-3 hidden md:table-cell"> <!-- Esta celda se mostrará en pantallas de tamaño "md" o mayores -->
                    CONTACTO
                </th>
            </tr>
        </thead>
        <!-- Body tabla -->
        <tbody>
            @foreach($users as $user) <!-- Bucle para llenar la tabla -->
            <tr class="focus:ring-4 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-green-100 dark:hover:bg-gray-800 dark:hover:border-green-600">
                <td class="w-4 p-4"><!-- Checkbox -->
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td>
                <!-- Información del usuario || Al hacer clic encima de cada uno se abre el modal -->
                <th scope="row" title="click para ver, editar o eliminar">
                    <a href="{{ route('usuarios.edit', encrypt($user->id)) }}" class="cursor-pointer flex items-center px-1 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="w-10 h-10 relative rounded-full bg-cover bg-center md:w-auto md:h-auto">
                            @if($user->image === null)
                            <svg class="w-10 h-10 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                            @else
                            <img class="w-10 h-10 rounded-full" src="{{ $user->image ?? null}} "alt="user photo">
                            @endif
                        </div>
                        <div class="pl-3">
                            <div class="flex flex-wrap sm:flex-no-wrap">
                                <div class="text-base font-semibold mr-1.5">{{$user->name ?? null }}</div>
                                <div class="text-base font-semibold">{{$user->last_name ?? null}}</div>
                            </div>
                            <div class="font-normal text-gray-500">{{$user->email ?? null}} </div>
                        </div>
                    </a>
                </th>
                <td> <!-- Esta celda se mostrará en pantallas de tamaño "md" o mayores -->
                    <a href="{{ route('usuarios.edit', encrypt($user->id)) }}" class="cursor-pointer px-6 py-4 hidden md:table-cell">
                        {{$user->data_users->first()->tipo_dni ?? null}}: {{$user->data_users->first()->dni_user ?? null}}
                    </a>
                </td>
                <td> <!-- Esta celda se mostrará en pantallas de tamaño "md" o mayores -->
                    <a href="{{ route('usuarios.edit', encrypt($user->id)) }}" class="cursor-pointer px-6 py-4 hidden md:table-cell">
                        <div class="flex items-center">
                            {{$user->data_users->first()->cell ?? null}}
                        </div>
                    </a>
                </td>
            </tr>
            @endforeach <!-- Fin del bucle -->
        </tbody>
    </table>
    {{ $users->links('vendor.pagination.tailwind') }}
    <!-- Fin tabla -->
</div>
