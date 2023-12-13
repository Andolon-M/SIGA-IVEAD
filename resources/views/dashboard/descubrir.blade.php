@extends('/layouts.dashboard')
<script async defer src="https://dailyverses.net/get/verse.js?language=nvi"></script>
@section('panel')
<h1 class="text-green-900 dark:text-neutral-50 text-2xl">
    <strong>PANEL DESCUBRIR IGLESIA VIDA Y ESPERANZA</strong>
</h1>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
    <!-- Bloque 1 - Versículos diarios -->
    <div class="bg-gray-50 dark:bg-gray-800 min-h-28 rounded p-4 flex flex-col items-center justify-center text-green-900 dark:text-neutral-50 text-xl">
        <div class="flex-grow" id="dailyVersesWrapper">
            <!-- Contenido de texto aquí -->
        </div>
        <p class="text-gray-500 text-center mt-2">(NVI)</p>
    </div>
    @role('Miembro')
    <!-- Bloque 2 - Información sobre privilegios -->
    <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
            Información sobre privilegios
        </p>
    </div>
@endrole
    <!-- Bloque 3 - Transmisión más reciente -->
    <div class="bg-gray-50 dark:bg-gray-800 rounded pt-2 pb-4 flex justify-center items-center flex-col">
        <h2 class="text-green-900 dark:text-neutral-50 text-xl mb-2"><strong>Transmisión más reciente</strong></h2>
        <div style="inline-size: 100%; max-inline-size: 702px;">
            <div style="position: relative; padding-block-start: 56.25%;">
                <iframe class="rounded-lg absolute inset-0 w-full h-full" src="{{ $videoNuevo->url_iframe ?? null}}" title="Último servicio dominical" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Bloque 4 - Transmisiones anteriores -->
    <div class="rounded bg-gray-50 h-28 dark:bg-gray-800 flex justify-center items-center">
        <div class=" flex  flex-col">
            <div class="text-green-900 dark:text-neutral-50 text-xl px-8 mb-4 flex justify-center items-center">
                <h2><strong>Transmisiones anteriores:</strong></h2>
            </div>

            <div class="">
                <table class="w-full table-auto">
                    <tbody>
                        @foreach ($videosViejos as $videoViejo)
                        <tr>
                            <td>
                                <a href="{{ $videoViejo->url }}" class="text-green-900 dark:text-neutral-50 text-lg hover:bg-green-200 dark:hover:bg-green-900 rounded-lg focus:ring-4 focus:ring-green-300 dark:focus:ring-green-600 p-1 px-5 py-1 mx-1">
                                    {{ $videoViejo->nombre ?? null }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection