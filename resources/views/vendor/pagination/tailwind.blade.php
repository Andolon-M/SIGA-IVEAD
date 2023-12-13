@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="p-1 flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <!-- Botón "Anterior" deshabilitado si estamos en la primera página -->
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-green-900 dark:text-white rounded hover:bg-green-800 hover:text-white dark:hover:bg-green-900     focus:z-10 focus:outline-none focus:ring ring-green-300 focus:border-green-300 active:bg-green-800 active:text-white dark:active:bg-green-900  transition ease-in-out duration-150 cursor-default leading-5">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <!-- Botón "Anterior" habilitado con evento Livewire para ir a la página anterior -->
                <button wire:click="previousPage" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium  bg-white border border-green-300 dark:border-none leading-5 dark:bg-green-900 text-green-900 dark:text-white rounded hover:bg-green-800 hover:text-white dark:hover:bg-green-900     focus:z-10 focus:outline-none focus:ring ring-green-300 focus:border-green-300 active:bg-green-800 active:text-white dark:active:bg-green-900  transition ease-in-out duration-150">
                    {!! __('pagination.previous') !!}
                </button>
            @endif

            @if ($paginator->hasMorePages())
                <!-- Botón "Siguiente" habilitado con evento Livewire para ir a la página siguiente -->
                <button wire:click="nextPage" rel="next" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium bg-white border border-green-300 dark:border-none leading-5 dark:bg-green-900 text-green-900 dark:text-white rounded hover:bg-green-800 hover:text-white dark:hover:bg-green-900     focus:z-10 focus:outline-none focus:ring ring-green-300 focus:border-green-300 active:bg-green-800 active:text-white dark:active:bg-green-900  transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </button>
            @else
                <!-- Botón "Siguiente" deshabilitado si no hay más páginas -->
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium bg-white border border-green-300 dark:border-none leading-5 dark:bg-green-900 text-green-900 dark:text-white rounded hover:bg-green-800 hover:text-white dark:hover:bg-green-900     focus:z-10 focus:outline-none focus:ring ring-green-300 focus:border-green-300 active:bg-green-800 active:text-white dark:active:bg-green-900  transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <!-- Muestra información sobre los resultados actuales -->
                <p class="text-sm text-green-700 dark:text-gray-300 leading-5">
                    {!! __('Registros del ') !!}
                    @if ($paginator->firstItem())
                        <!-- Muestra el rango de elementos mostrados -->
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('al') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        <!-- Muestra el número total de elementos en la página actual -->
                        {{ $paginator->count() }}
                    @endif
                    {!! __('') !!}
                </p>
            </div>

            <div>
                <!-- Contenedor para la paginación de números y botones -->
                <span class="relative z-0 inline-flex shadow-sm   text-green-900 dark:text-white bg-white dark:bg-gray-700 rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <!-- Botón "Anterior" deshabilitado si estamos en la primera página -->
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-green-900 dark:text-white  rounded hover:bg-green-800 hover:text-white dark:hover:bg-green-900 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                <!-- Icono de flecha izquierda -->
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <!-- Botón "Anterior" habilitado con evento Livewire para ir a la página anterior -->
                        <button wire:click="previousPage" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-green-900 dark:text-white rounded hover:bg-green-800 hover:text-white dark:hover:bg-green-900  focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                            <!-- Icono de flecha izquierda -->
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <!-- Punto suspensivo para indicar elementos intermedios -->
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-green-900 dark:text-white rounded hover:bg-green-800 hover:text-white dark:hover:bg-green-900  cursor-default leading-5 ring-green-300 focus:border-green-300 active:bg-green-800 active:text-white dark:active:bg-green-900 ease-in-out duration-150">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <!-- Número de página actual resaltado -->
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium  text-green-900 dark:text-white rounded hover:bg-green-800 hover:text-white dark:hover:bg-green-900  cursor-default leading-5 ring-green-300 focus:border-green-300 active:bg-green-800 active:text-white dark:active:bg-green-900 ease-in-out duration-150">{{ $page }}</span>
                                    </span>
                                @else
                                    <!-- Botón para ir a una página específica con evento Livewire -->
                                    <button wire:click="gotoPage({{ $page }})" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium  text-green-900 dark:text-white rounded hover:bg-green-800 hover:text-white dark:hover:bg-green-900  focus:z-10 focus:outline-none focus:ring ring-green-300 focus:border-green-300 active:bg-green-800 active:text-white dark:active:bg-green-900 transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </button>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <!-- Botón "Siguiente" habilitado con evento Livewire para ir a la página siguiente -->
                        <button wire:click="nextPage" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium  text-green-900 dark:text-white rounded hover:bg-green-800 hover:text-white dark:hover:bg-green-900     focus:z-10 focus:outline-none focus:ring ring-green-300 focus:border-green-300 active:bg-green-800 active:text-white dark:active:bg-green-900  transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                            <!-- Icono de flecha derecha -->
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @else
                        <!-- Botón "Siguiente" deshabilitado si no hay más páginas -->
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium   text-green-900 dark:text-white rounded hover:bg-green-300 dark:hover:bg-green-900   cursor-default rounded-r-md leading-5" aria-hidden="true">
                                <!-- Icono de flecha derecha -->
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010 1.414L10.586 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
