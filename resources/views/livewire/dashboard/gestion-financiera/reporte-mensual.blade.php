<div>
    @livewire('Dashboard.GestionFinanciera.EditEgress')
    @livewire('Dashboard.GestionFinanciera.EditDeposit')
    <!--seccion de historial reportes-->
    <div class="flex flex-col">
        <div class="flex flex-col p-2">
            <ul>
                @php
                $fecha = \Carbon\Carbon::parse($date); // Convierte tu fecha en un objeto Carbon
                $mesActual = \Carbon\Carbon::now()->endOfMonth(); // Obtiene el inicio de la semana actual

                $esMesActual = $fecha->isSameMonth($mesActual); // Verifica si la fecha está en la misma semana que la semana actual
                @endphp

                @if ($esMesActual)
                <!-- La fecha corresponde a la semana actual -->
                <p class="text-lg font-semibold  text-white bg-green-600 p-4 rounded-2xl">Estas viendo el mes actual</p>
                <p class="text-3xl text-green-900 font-semibold">Reporte Mensual ({{ \Carbon\Carbon::parse($date)->format('d/m/Y') ?? null }})</p>

                @else
                <!-- La fecha no corresponde a la semana actual -->
                <p class="text-3xl text-green-900 font-semibold">Reporte Mensual ({{ \Carbon\Carbon::parse($date)->format('d/m/Y') ?? null }})</p>

                @endif


            </ul>
            <p class="text-xl mb-3 text-green-900 font-semibold">Serial: {{$reporteid ?? "No disponible"}}</p>
            <p class="text-lg  text-green-900 font-semibold">Ofrendas: ${{ number_format($totalOfrendas?? 0, 0, ',', '.') }}</p>
            <p class="text-lg text-green-900 font-semibold">Diezmos: ${{ number_format($totalDiezmos?? 0, 0, ',', '.') }}</p>
            <p class="text-lg text-green-900 font-semibold">Egresos Caja: ${{ number_format($totalCaja?? 0, 0, ',', '.') }}</p>
            <p class="text-lg mb-3 text-green-900 font-semibold">Egresos Caja Menor: ${{ number_format($totalCajaMenor?? 0, 0, ',', '.') }}</p>
            <p class="text-xl text-green-900 font-semibold">total Ingresos: ${{ number_format($totalingresos?? 0, 0, ',', '.') }}</p>
            <p class="text-xl mb-3 text-green-900 font-semibold">total Egresos: ${{ number_format($totalegresos?? 0, 0, ',', '.') }}</p>

            <div class=" border-l-4 border-green-500 text-green-700">
                <p class="text-xl  ml-2 text-green-900 font-semibold">Detalles:</p>
                <div class="flex flex-wrap lg:flex-nowrap  align-top">
                    <div class=" flex md:w-full lg:w-1/2 m-2 ">
                        <!-- Inicio tabla -->
                        <table class="w-full text-sm text-left text-green-800 dark:text-white dark:bg-gray-700 mt-4 ">
                            <!-- Header tabla -->
                            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-900 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-1 pb-3 "> <!-- Esta celda se mostrará en pantallas de tamaño "md" o mayores -->
                                        VALOR / TIPO
                                        <p>toque un registro para ver, editar o eliminar</p>
                                    </th>
                                    <th scope="col" class="py-3 hidden md:table-cell">
                                        NOMBRE DONANTE
                                    </th>
                                    <th scope="col" class="px-1 py-3 "> <!-- Esta celda se mostrará en pantallas de tamaño "md" o mayores -->
                                        FECHA
                                    </th>
                                </tr>
                            </thead>
                            <!-- Body tabla -->
                            <tbody>
                                @foreach($ingresos as $ingreso)
                                <tr class="focus:ring-4 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-green-100 dark:hover:bg-gray-800 dark:hover:border-green-600">
                                    <!-- Información del usuario || Al hacer clic encima de cada uno se abre el modal -->
                                    <th scope="row" title="click para ver, editar o eliminar">
                                        <a @click="$dispatch('show-modal-edit', { 'id': {{$ingreso->id}} })" class="cursor-pointer flex items-center px-1 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="w-10 h-10 relative rounded-full bg-cover bg-center md:w-auto md:h-auto">
                                                <svg class="w-10 h-10 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M15.434 1.235A2 2 0 0 0 13.586 0H2.414A2 2 0 0 0 1 3.414L6.586 9a2 2 0 0 0 2.828 0L15 3.414a2 2 0 0 0 .434-2.179Z" />
                                                </svg>
                                            </div>

                                            <div class="pl-3">
                                                <div class="flex flex-wrap sm:flex-no-wrap">
                                                    <!-- Formatea el valor como moneda -->
                                                    <div class="text-base font-semibold mr-1.5">${{ number_format($ingreso->value ?? 0, 0, ',', '.') }}</div>
                                                </div>
                                                <div class="font-normal text-gray-500">{{$ingreso->type ?? null}} </div>
                                            </div>
                                        </a>
                                    </th>
                                    <td class="hidden md:table-cell"> <!-- Esta celda se mostrará en pantallas de tamaño "md" o mayores -->
                                        <a @click="$dispatch('show-modal-edit', { 'id': {{$ingreso->id}} })" class="cursor-pointer py-4 ">
                                            <div class="pl-3">
                                                <div class="flex flex-wrap sm:flex-no-wrap">
                                                    <div class="text-md font-semibold mr-1.5">{{$ingreso->donor_name ?? null }}</div>
                                                </div>
                                                <div class="font-normal text-gray-500">{{$ingreso->type_donor_id ?? null}}: {{$ingreso->donor_id ?? null}} </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td> <!-- Esta celda se mostrará en pantallas de tamaño "md" o mayores -->
                                        <a @click="$dispatch('show-modal-edit', { 'id': {{$ingreso->id}} })" class="cursor-pointer py-4 ">
                                            <div class="flex items-center">
                                                <!-- Formatea la fecha como DD/MM/AAAA -->
                                                {{ \Carbon\Carbon::parse($ingreso->date)->format('d/m/Y') ?? null }}
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach <!-- Fin del bucle -->

                            </tbody>
                        </table>
                        <!-- Fin tabla -->
                    </div>
                    <div class="flex md:w-full lg:w-1/2 m-2">
                        <!--seccion de egresos-->
                        <!-- Inicio tabla -->
                        <table class="w-full text-sm text-left text-green-800 dark:text-white dark:bg-gray-700 my-4">
                            <!-- Header tabla -->
                            <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-900 dark:text-gray-300">
                                <tr>
                                    <th scope="col" class="px-2 py-3 "> <!-- Esta celda se mostrará en pantallas de tamaño "md" o mayores -->
                                        VALOR / TIPO
                                        <p>toque un registro para ver, editar o eliminar</p>
                                    </th>
                                    <th scope="col" class="px-1 py-3 hidden md:table-cell">
                                        DESCRIPCION
                                    </th>
                                    <th scope="col" class="px-1 py-3 "> <!-- Esta celda se mostrará en pantallas de tamaño "md" o mayores -->
                                        FECHA
                                    </th>
                                </tr>
                            </thead>
                            <!-- Body tabla -->
                            <tbody>
                                @foreach($egresos as $egreso)
                                <tr class="focus:ring-4 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-green-100 dark:hover:bg-gray-800 dark:hover:border-green-600">
                                    <!-- Información del usuario || Al hacer clic encima de cada uno se abre el modal -->
                                    <th scope="row" title="click para ver, editar o eliminar">
                                        <a @click="$dispatch('show-modal-edit-egreso', { 'id': {{$egreso->id}} })" class="cursor-pointer flex items-center px-1 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="w-10 h-10 relative rounded-full bg-cover bg-center md:w-auto md:h-auto">
                                                <svg class="w-10 h-10 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.207 1A2 2 0 0 0 6.38 1L.793 6.586A2 2 0 0 0 2.207 10H13.38a2 2 0 0 0 1.414-3.414L9.207 1Z" />
                                                </svg>
                                            </div>

                                            <div class="pl-3">
                                                <div class="flex flex-wrap sm:flex-no-wrap">
                                                    <!-- Formatea el valor como moneda -->
                                                    <div class="text-base font-semibold mr-1.5">${{ number_format($egreso->value ?? 0, 0, ',', '.') }}</div>
                                                </div>
                                                <div class="font-normal text-gray-500">{{$egreso->type ?? null}} </div>
                                            </div>
                                        </a>
                                    </th>
                                    <td class="hidden md:table-cell"> <!-- Esta celda se mostrará en pantallas de tamaño "md" o mayores -->
                                        <a @click="$dispatch('show-modal-edit-egreso', { 'id': {{$egreso->id}} })" class="cursor-pointer px-2 py-4 ">
                                            <div class="pl-3">
                                                <div class="flex flex-wrap sm:flex-no-wrap">
                                                    <div class="font-normal text-gray-500">{{$egreso->description ?? null}} </div>

                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td> <!-- Esta celda se mostrará en pantallas de tamaño "md" o mayores -->
                                        <a @click="$dispatch('show-modal-edit-egreso', { 'id': {{$egreso->id}} })" class="cursor-pointer px-2 py-4 ">
                                            <div class="flex items-center">
                                                <!-- Formatea la fecha como DD/MM/AAAA -->
                                                {{ \Carbon\Carbon::parse($egreso->date)->format('d/m/Y') ?? null }}
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach <!-- Fin del bucle -->

                            </tbody>
                        </table>
                        <!-- Fin tabla -->

                    </div>
                </div>
            </div>



        </div>
        <div class="">
            <div class="flex items-center justify-between p-2 bg-white dark:bg-gray-800  flex-wrap">
                <div class="">
                    <p class="text-3xl  text-green-800 font-semibold">Historial de Reportes Mensuales
                    <p class="text-lg text-gray-400"> Del más nuevo al más viejo </p>
                    </p>
                </div>
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
                <div class="flex flex-wrap space-x-2 space-y-2">
                    <div>
                        <label for="countries" class="block mx-2 mt-1 text-sm font-medium text-green-900 dark:text-white">Número de resultados</label>
                        <select id="countries" wire:model.live="numpaginate" class="mx-2 sm rounded-full border-green-300 text-green-900 text-sm focus:ring-green-500 focus:border-green-500 dark:bg-gray-900 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                            <option value="5" selected>5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <!-- Inicio campo de búsqueda -->
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative my-2 ">
                            <!-- Icono de buscar -->
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <!-- Campo de búsqueda -->
                            <input wire:model.live.debounce.700ms="search" type="text" id="table-search-movimiento" class="block p-2 pl-10 text-sm text-gray-900 border border-green-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Buscar Transacción">
                        </div>
                    </div>
                </div>


            </div>

            <div>
                <!-- Inicio tabla -->
                <table class="w-full text-sm text-left text-green-800 dark:text-white dark:bg-gray-700 mt-4">
                    <!-- Header tabla -->
                    <thead class="text-xs text-gray-700 bg-gray-50 dark:bg-gray-900 dark:text-gray-300">
                        <tr>
                            <th scope="col" class="px-1 py-3">
                                FECHA
                                <p>Toque un registro para ver, editar o eliminar</p>
                            </th>

                            <th scope="col" class="px-1 py-3">
                                SERIAL
                            </th>
                        </tr>
                    </thead>
                    <!-- Body tabla -->
                    <tbody>
                        @foreach($reportes as $reporte)
                        <tr class="focus:ring-4 bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-green-100 dark:hover:bg-gray-800 dark:hover:border-green-600">
                            <!-- Información del usuario || Al hacer clic encima de cada uno se abre el modal -->
                            <th scope="row" title="Click para ver, editar o eliminar">
                                <a @click="$dispatch('show', { 'id': {{ $reporte->id }} })" class="cursor-pointer flex items-center px-1 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="w-10 h-10 relative rounded-full bg-cover bg-center md:w-auto md:h-auto">
                                        <svg class="w-10 h-10 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5h8m-1-3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1m6 0v3H6V2m6 0h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m0 9.464 2.025 1.965L12 9.571" />
                                        </svg>
                                    </div>

                                    <div class="pl-3">
                                        <div class="flex flex-wrap sm:flex-no-wrap">
                                            <!-- Formatea el valor como moneda -->
                                            <div class="text-lg font-semibold mr-1.5">{{ \Carbon\Carbon::parse($reporte->date)->format('d/m/Y') ?? null }}</div>
                                        </div>
                                    </div>
                                </a>
                            </th>

                            <td>
                                <a @click="$dispatch('show-modal-edit', { 'id': {{$reporte->id}} })" class="cursor-pointer py-4">
                                    <div class="flex items-center">
                                        <!-- Mostrar el serial del reporte mensual -->
                                        {{$reporte->serial ?? null }}
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endforeach <!-- Fin del bucle -->
                    </tbody>
                </table>
            </div>

            <!-- Fin tabla -->
        </div>
        {{ $reportes->links('vendor.pagination.tailwind') }}
    </div>