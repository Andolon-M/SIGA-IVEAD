<div>
    @role('Administrador|Pastor')
    @livewire('Dashboard.GestionEquipos.ModalAgregarMiembro')
    @livewire('Dashboard.GestionEquipos.ModalCrearEquipo')
    @livewire('Dashboard.GestionEquipos.ModalDeleteTeam')
    <div class="">
        <button wire:click="$dispatch('show-modal-create')" class="cursor-pointer  sm:w-auto text-white bg-green-700 hover:bg-green-900  dark:bg-gray-800 dark:hover:bg-green-900 border border-green-600 dark:focus:ring-green-800focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-2 py-2.5 m-1 text-center">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-white dark:text-white mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                    <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                    <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                </svg>
                Nuevo Equipo
            </div>
        </button>
    </div>
    <div class=" relative">
        <!--Listado de equipos-->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            @foreach($teams as $team)<!--buqcle para listar los equipos-->
            <!--contenedor del equipo-->
            <div class="relative cursor-pointer hover:bg-green-100 dark:hover:bg-green-900 bg-gray-50 dark:bg-gray-800 min-h-28 rounded p-4 flex flex-col text-green-900 dark:text-neutral-50">
                <!--nombre del equipo-->
                <div class="flex ">
                    <p class="rounded-full w-3 h-3 bg-green-900 dark:bg-neutral-50 mt-2 mr-1"></p>
                    <h1 class="mb-3 text-lg felx "> <strong>{{$team->name}} </strong><br></h1><!--nombre del equipo-->
                </div>
                <!--informacion del equipo-->
                <div class="flex items-start flex-col justify-start relative">
                    <!--nombre del lider del equipo-->
                    <p class="text-left text-2sm">
                        <strong>Lider del equipo:</strong> {{$team->perteneceUser->name}} {{$team->perteneceUser->last_name}}
                    </p>
                    <!--lista de miembros del equipo-->
                    <p class="text-left dark:text-neutral-50 text-green-900 text-2sm mt-2">
                        <strong>Miembros del equipo:</strong> <br>
                        @foreach($team->miembros as $miembro) <!--bucle para llenar la lista de miembros-->
                    <div class="flex items-start justify-start text-sm">
                        <p class="rounded-full w-2 h-2 bg-green-900 dark:bg-neutral-50 mt-2 mr-1"></p>
                        {{$miembro->usuario->name ??  null}} {{$miembro->usuario->last_name ??  null}} ({{$miembro->usuario->data_users->first()->dni_user ??  null}}) <br>
                    </div>
                    @endforeach
                    </p>
                </div>
                <div class="absolute right-0 bottom-0 flex flex-wrap space-x-2 m-2">
                    <a @click="$dispatch('show_modal_add_member', { 'id': {{$team->id}} })" class=" py-1 px-2 rounded-full bg-green-700 dark:bg-gray-900 hover:bg-green-800 dark:border dark:border-green-500  " title="Agragar miembros o editar equipo">
                        <svg class="w-6 h-6 text-white   mb-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z" />
                        </svg>
                    </a>
                    <a @click="$dispatch('show_modal_delete_team', { 'id': {{$team->id}} })" class=" py-1 px-2 rounded-full bg-red-500 dark:bg-gray-900 hover:bg-red-800  dark:border-red-500  " title="Eliminar Equipo">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        {{ $teams->links('vendor.pagination.tailwind') }}
    </div>
    @endcan
</div>