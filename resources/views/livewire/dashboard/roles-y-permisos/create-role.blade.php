<div>
    <div class="transition ease-in-out duration-150">
        @if($modalopen)
        <!-- create Modal -->
        <div class="fixed inset-0 flex items-center justify-center z-50 transition ease-in-out duration-150">
            <!-- Capa semitransparente de fondo -->
            <div class="fixed inset-0 bg-black opacity-50"></div>

            <div id="modalCreate" tabindex="-1" class="relative top-0 left-0 right-0 z-50 w-full overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-2rem)] max-h-full transition ease-in-out duration-150">
                <div class="relative w-min max-w-screen-sm md:max-w-3xl mx-auto h-[calc(100%-2rem)] max-h-full transition ease-in-out duration-150">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-900 transition ease-in-out duration-150">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                            <h2 class="text-2xl font-medium text-green-900 dark:text-white">
                                Editar Equipo
                            </h2>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" wire:click="$dispatch('close-modal')">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="flex p-6 space-y-6">
                            <form wire:submit.prevent="save">
                                @csrf <!-- Agrega el token CSRF para protección -->
                                <div class="">
                                    <div class="shadow-2xl mx-2 my-2 rounded-lg p-2 bg-white  dark:bg-gray-800 ">
                                        <h4 class="text-lg font-medium text-green-900  dark:text-white mb-5">
                                            Crear nuevo rol
                                        </h4>


                                        <div class="mb-6 mx-1">
                                            <!-- Nombre del equipo -->
                                            <label for="name_rol" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre del equipo</label>
                                            <input type="text" id="name" name="name_rol" wire:model.blur="name_rol" class="shadow-sm bg-gray-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 " placeholder="Ingrese el nombre aquí">
                                            <x-input-error :messages="$errors->get('name_rol')" class="mt-2" />
                                        </div>

                                    </div>


                                </div>

                                <!-- Modal footer -->
                                <div class="flex items-center pt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Actualizar</button>
                            </form>
                            <button wire:click="$dispatch('close-modal')" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endif
    </div>
</div>