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
                                    Modificar Recurso
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

                                    <div class="shadow-2xl mx-2 my-2 rounded-lg p-2 bg-white  dark:bg-gray-800 ">
                                        <h4 class="text-lg font-medium text-green-900  dark:text-white mb-5">
                                            Detalles del recurso
                                        </h4>
                                        <div class="flex flex-wrap sm:flex-no-wrap space-y-2 space-x-2">
                                            <div class="space-y-2 space-x-2">

                                                <div class="my-1">
                                                    <!-- Nombre del equipo -->
                                                    <label for="name" class="block mb-2 text-sm font-medium text-green-900 dark:text-gray-300">Nombre del recurso</label>
                                                    <input type="text" id="nombre" name="nombre" wire:model.blur="nombre" class="shadow-sm bg-gray-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 " placeholder="Ingrese el nombre aquí">
                                                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                                                </div>
                                                <div class="my-1">
                                                    <label for="descripcion" class="block mb-2 text-sm font-medium text-green-900 dark:text-gray-300">Descripcion</label>
                                                    <textarea wire:model.live="descripcion" id="descripcion" rows="4" class="bg-gray-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500" placeholder="Escriba aqui la descripcion"></textarea>
                                                    <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="space-y-2 space-x-2">
                                                <div class="mx-4  col-sm-4">
                                                    <!-- Tipo de documento -->
                                                    <label for="tipo_dni" class="block mb-2 text-sm font-medium text-green-900 dark:text-gray-300">Tipo de Archivo</label>
                                                    <select id="tipo_dni" name="tipo_dni" wire:model.live="tipo_recurso" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 ">
                                                        <option value="null">---Seleccione---</option>
                                                        <option value="Archivo PDF" @if($tipo_recurso=="Archivo PDF" ) selected @endif>Archivo PDF</option>
                                                        <option value="Archivo Word" @if($tipo_recurso=="Archivo Word" ) selected @endif>Archivo Word</option>
                                                        <option value="Archivo Point" @if($tipo_recurso=="Archivo Point" ) selected @endif>Archivo Point</option>
                                                        <option value="Archivo Excel" @if($tipo_recurso=="Archivo Excel" ) selected @endif>Archivo Excel</option>
                                                        <option value="URL" @if($tipo_recurso=="URL" ) selected @endif>URL</option>
                                                        <option value="Video de YouTube" @if($tipo_recurso=="Video de YouTube" ) selected @endif>Video de YouTube</option>
                                                        <option value="Servicio Dominical" @if($tipo_recurso=="Servicio Dominical" ) selected @endif>Servicio Dominical</option>
                                                        <option value="Otro" @if($tipo_recurso=="Otro" ) selected @endif>Otro</option>
                                                    </select>
                                                    <x-input-error :messages="$errors->get('tipo_recurso')" class="mt-2" />
                                                </div>

                                                @if($tipo_recurso == "URL" || $tipo_recurso == "Video de YouTube" ||$tipo_recurso == "Servicio Dominical")
                                                <div class="my-1">
                                                    <!-- Url -->
                                                    <label for="url" class="block mb-2 text-sm font-medium text-green-900 dark:text-gray-300">URL del archivo</label>
                                                    <input type="url" id="url" name="url" wire:model.blur="url" class="shadow-sm bg-gray-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 " placeholder="Pegue el enlace aqui">
                                                    <x-input-error :messages="$errors->get('url')" class="mt-2" />
                                                </div>
                                                @if($tipo_recurso == "Servicio Dominical" || $tipo_recurso == "Video de YouTube")

                                                <div class="my-1">
                                                    <!-- Url -->
                                                    <label for="url_iframe" class="block mb-2 text-sm font-medium text-green-900 dark:text-gray-300">URL de incrustacion</label>
                                                    <input type="url" id="url_iframe" name="url_iframe" wire:model.blur="url_iframe" class="shadow-sm bg-gray-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 " placeholder="Pegue el enlace aqui">
                                                    <x-input-error :messages="$errors->get('url_iframe')" class="mt-2" />
                                                </div>

                                                @endif
                                                @elseif($tipo_recurso == "Otro" )
                                                <div class="my-1 mx-8">
                                                    <label class="block mb-2 text-sm font-medium text-green-900 dark:text-white" for="user_avatar">Subir Archivo</label>
                                                    <input wire:model.live="archivo" class="block w-full text-sm text-green-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                                    <div class="mt-1 text-sm text-green-500 dark:text-gray-300" id="user_avatar_help">Seleccione el archivo que desea subir</div>
                                                </div>
                                                <div class="my-1">
                                                    <!-- Url -->
                                                    <label for="url" class="block mb-2 text-sm font-medium text-green-900 dark:text-gray-300">URL del archivo</label>
                                                    <input type="url" id="url" name="url" wire:model.blur="url" class="shadow-sm bg-gray-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 " placeholder="Pegue el enlace aqui">
                                                    <x-input-error :messages="$errors->get('url')" class="mt-2" />
                                                </div>

                                                @else
                                                <div class="my-1 mx-8">
                                                    <label class="block mb-2 text-sm font-medium text-green-900 dark:text-white" for="user_avatar">Subir Archivo</label>
                                                    <input wire:model.live="archivo" class="block w-full text-sm text-green-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                                                    <div class="mt-1 text-sm text-green-500 dark:text-gray-300" id="user_avatar_help">Seleccione el archivo que desea subir</div>
                                                    <x-input-error :messages="$errors->get('archivo')" class="mt-2" />
                                                </div>
                                                @endif

                                            </div>

                                        </div>


                                    </div>


                                    <!-- Modal footer -->
                                    <div class="flex items-center pt-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                        <button type="submit" class="flex items-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            <div class="flex items-center">
                                                <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />
                                                </svg>
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 1v5h-5M2 19v-5h5m10-4a8 8 0 0 1-14.947 3.97M1 10a8 8 0 0 1 14.947-3.97" />

                                                <span>Actualizar</span>
                                            </div>
                                        </button>
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