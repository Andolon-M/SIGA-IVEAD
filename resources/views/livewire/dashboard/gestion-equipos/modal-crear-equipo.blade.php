<div>

    <div class="transition ease-in-out duration-150">
        @if($modalopen)
        <!-- create Modal -->
        <div class="fixed inset-0 flex items-center justify-center z-50 transition ease-in-out duration-150">
            <!-- Capa semitransparente de fondo -->
            <div class="fixed inset-0 bg-black opacity-50"></div>
            <div>
                <div id="modalCreate" tabindex="-1" class="relative  top-0 left-0 right-0 z-50  w-full px-2 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full transition ease-in-out duration-150">
                    <div class="relative w-full max-w-5xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-900 transition ease-in-out duration-150">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                <h2 class="text-2xl font-medium text-green-900 dark:text-white">
                                    Crear Equipo
                                </h2>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" wire:click="$dispatch('close-modal')">
                            <svg class=" w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6 flex items-center justify-center">
                                <form wire:submit.prevent="save">
                                    @csrf <!-- Agrega el token CSRF para protección -->
                                    <div class="flex flex-wrap sm:flex-no-wrap">
                                        <div class="shadow-2xl mx-2 my-2 rounded-lg p-2 bg-white  dark:bg-gray-800 ">
                                            <h4 class="text-lg font-medium text-green-900  dark:text-white mb-5">
                                                Datos del equipo
                                            </h4>


                                            <div class="mb-6 mx-1">
                                                <!-- Nombre del equipo -->
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre del equipo</label>
                                                <input type="text" id="name" name="name" wire:model.blur="name" class="shadow-sm bg-gray-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 " placeholder="Ingrese el nombre aquí">
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>

                                            @if($id_lider == null)
                                            <div>
                                                <div class="mb-6 mx-1">
                                                    <!-- Lider del equipo -->

                                                    <div class="relative my-2">
                                                        <!--Icono de buscar-->
                                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                            </svg>
                                                        </div>
                                                        <!--campo de busqueda-->
                                                        <input wire:model.live.debounce.700ms="searchlider" type="text" id="table-search-lider-team" class="block p-2 pl-10 text-sm text-gray-900 border border-green-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar Usuarios">

                                                    </div>
                                                </div>

                                                <div class="relative overflow-x-auto">
                                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Nombre
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Identificacion
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Accion
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if ($users)
                                                            @forelse ($users as $user)
                                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                    {{$user->name}} {{$user->last_name}}
                                                                </th>
                                                                <td class="px-6 py-4">
                                                                    {{$user->data_users->first()->tipo_dni ?? null}}: {{$user->data_users->first()->dni_user ?? null}}
                                                                </td>

                                                                <td class="px-6 py-4">
                                                                    <a @click="$dispatch('asignar_lider', {id:{{$user->id}}})" class=" cursor-pointer rounded bg-green-700 dark:bg-gray-900 hover:green-900 text-white dark:border dark:border-green-500 p-1">
                                                                        Asignar 
                                                                    </a>
                                                                    
                                                                </td>
                                                            </tr>
                                                            @empty
                                                            <p>no se encontraron coincidencias</p>
                                                            @endforelse
                                                            @else
                                                            <p>La variable $users está vacía o es nula.</p>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            @else
                                            <div class="mb-6 mx-1">
                                                <label for="id_lider" class="block  text-sm font-medium text-gray-900 dark:text-gray-300">Lider del equipo</label>
                                                <div class="mr-2 flex items-center">
                                                    <div>
                                                        <p class="text-lg"><strong>Nombre: {{$name_lider ?? null}} </strong></p>
                                                        <p class="text-sm">Identificación {{$dni_lider ?? null}} </p>
                                                        <p class="text-sm">Contacto: {{$cell_lider ?? null}} </p>
                                                    </div>
                                                    <a @click="$dispatch('cambiar_lider')" class="ml-auto block cursor-pointer rounded bg-green-700 dark:bg-gray-900 hover:green-900 text-white dark:border dark:border-green-500 p-1 max-w-fit max-h-fit">Cambiar</a>
                                                </div>

                                            </div>

                                            @endif
                                            <x-input-error :messages="$errors->get('id_lider')" class="mt-2" />


                                        </div>
                                        

                                    </div>

                                    <!-- Modal footer -->
                                    <div class="flex items-center pt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"><i class="fa fa-check-square-o"></i> Crear</button>
                                </form>
                                <button wire:click="$dispatch('close-modal')" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif



    </div>
</div>