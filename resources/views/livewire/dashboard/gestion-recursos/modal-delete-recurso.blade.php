<div>
<div class="transition ease-in-out duration-150">
        @if($modalopen)
        <!-- delete Modal -->
        <div class="fixed inset-0 flex items-center justify-center z-50 transition ease-in-out duration-150">
            <!-- Capa semitransparente de fondo -->
            <div class="fixed inset-0 bg-black opacity-50"></div>
            <div>
                <div id="modalCreate" tabindex="-1" class="relative  top-0 left-0 right-0 z-50  w-full px-2 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full transition ease-in-out duration-150">
                    <div class="relative w-full max-w-5xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!--modal header-->
                                <button wire:click="$dispatch('close-modal_delete')" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <!--modal body-->
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <div class="col">
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Esta seguro que desea borrar este recurso?<br> {{$name ?? null}} <br> </h3>
                                        <p1 class="mb-5 text-sm font-normal text-gray-500 dark:text-gray-400">Esta accion no se podra revertir <br></p1>
                                        <!-- modal footer-->
                                        <button @click="$dispatch('delete_team')" class="bg-red-600 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm text-white inline-flex items-center px-5 py-2.5 text-center mr-2" type="submit">Si, estoy seguro</button>

                                        <button @click="$dispatch('close-modal_delete')" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endif
    </div>
</div>
