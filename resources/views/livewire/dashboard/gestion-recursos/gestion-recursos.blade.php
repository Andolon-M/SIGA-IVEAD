<div>
    @can('Gestion Recursos')
    @livewire('Dashboard.GestionRecursos.ModalCreateRecurso')
    @livewire('Dashboard.GestionRecursos.ModalDeleteRecurso')
    @livewire('Dashboard.GestionRecursos.ModalEditRecurso')
    <div class="">
        <button wire:click="$dispatch('show-modal-create')" class="cursor-pointer  sm:w-auto text-white bg-green-700 hover:bg-green-900  dark:bg-gray-800 dark:hover:bg-green-900 border border-green-600 dark:focus:ring-green-800focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-md px-2 py-2.5 m-1 text-center">
            <div class="flex items-center">
                <svg class="w-6 h-6 text-white dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m14.707 4.793-4-4a1 1 0 0 0-1.416 0l-4 4a1 1 0 1 0 1.416 1.414L9 3.914V12.5a1 1 0 0 0 2 0V3.914l2.293 2.293a1 1 0 0 0 1.414-1.414Z" />
                    <path d="M18 12h-5v.5a3 3 0 0 1-6 0V12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                </svg>
                Nuevo Recurso
            </div>
        </button>
    </div>
    <div class=" relative">
        <!--Listado de equipos-->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            @foreach($resources as $resource)<!--buqcle para listar los equipos-->
            <!--contenedor del equipo-->
            <div class="relative cursor-pointer hover:bg-green-100 dark:hover:bg-green-900 bg-gray-50 dark:bg-gray-800 min-h-28 rounded p-4 flex flex-col text-green-900 dark:text-neutral-50" title="Click para Abrir">
                <a href="{{$resource->url}}" target="_blank">
                    <!--nombre del equipo-->
                    <div class=" flex ">
                        <p class=" rounded-full w-3 h-3 bg-green-900 dark:bg-neutral-50 mt-2 mr-1"></p>
                    <h1 class="mb-3 text-lg felx "> <strong>{{$resource->nombre}} </strong><br></h1><!--nombre del equipo-->
            </div>
            <!--informacion del equipo-->
            <div class="flex items-start flex-col justify-start relative">
                <!--nombre del lider del equipo-->
                <p class="text-left text-2sm">
                    <strong>Descripcion:</strong> {{$resource->descripcion}}
                </p>
                <p class="text-left text-2sm">
                    <strong>Tipo:</strong> {{$resource->tipo}}
                </p>
            </div>
            </a>
            <div class="absolute right-0 bottom-0 flex flex-wrap space-x-2 m-2">
                <a @click="$dispatch('show_modal_edit_recurso', { 'id': {{$resource->id}} })" class=" py-1 px-2 rounded-full bg-green-700 dark:bg-gray-900 hover:bg-green-900  dark:border-green-500  " title="Editar Recurso">
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                        <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                        </svg>
                </a>
                <a @click="$dispatch('show_modal_delete_team', { 'id': {{$resource->id}} })" class=" py-1 px-2 rounded-full bg-red-700 dark:bg-gray-900 hover:bg-red-900  dark:border-red-500  " title="Eliminar Recurso">
                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                    </svg>
                </a>
            </div>
        </div>
        @endforeach

    </div>
    {{ $resources->links('vendor.pagination.tailwind') }}
</div>
@endcan
</div>