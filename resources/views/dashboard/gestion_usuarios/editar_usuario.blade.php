@extends('/layouts.dashboard')
@section('panel')
@can('Gestion Usuarios')
<div>
    <div class="px-8 py-5  bg-white dark:bg-gray-800 shadow sm:rounded-lg ">
        <div class="flex justify-between border-b border-gray-200 rounded-b dark:border-gray-600 mb-4 pb-3">
            <p class=" felx text-3xl  text-green-900  dark:text-white">Mostrando Usuario</p>
            <a href="{{route('usuarios.index')}}" class="h-fit md:w-auto text-white bg-green-700 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5  text-center dark:bg-gray-900 dark:hover:bg-green-800 dark:focus:ring-green-800 dark:border border-green-800 max-w-min" type="button">
                Volver
            </a>
        </div>

        <div class="flex flex-col md:flex-row gap-4">
            <div class="w-30 h-30 relative rounded-full bg-cover bg-center md:w-auto md:h-auto">

                @if($User->image === null)
                <svg class="w-28 h-28 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                </svg>
                @else
                <img class="w-30 h-30 rounded-full" src="{{ $User->image ?? null}}" alt="Jese image">
                @endif
            </div>
            <div class="mx-4">
                <div class="md:flex-grow">
                    <p class="text-3xl text-geen-900 dark:text-white"> <strong>{{$User->name ?? null}} {{$User->last_name ?? null }}</strong></p>
                    <p class=" text-lg text-geen-900 dark:text-white"><strong> Identificacion:</strong> {{$User->data_users->first()->tipo_dni ?? null}}: {{$User->data_users->first()->dni_user ?? null}} </p>
                    <p class="text-lg text-geen-900 dark:text-white"><strong>Género:</strong> {{$User->data_users->first()->gender ?? null}} </p>

                    @php
                    $birthdate = $User->data_users->first()->birthdate ?? null;
                    if ($birthdate) {
                    $birthdate = \Carbon\Carbon::parse($birthdate);
                    $formattedBirthdate = $birthdate->format('d/m/Y');

                    // Calcular la edad utilizando Laravel's diffInYears
                    $currentDate = now();
                    $age = $birthdate->diffInYears($currentDate);

                    // Comprobar si la fecha de nacimiento es posterior a la fecha actual
                    if ($birthdate > $currentDate) {
                    $age = 0; // Establecer la edad en 0 en lugar de null
                    }
                    } else {
                    $formattedBirthdate = 'N/A';
                    $age = 'N/A';
                    }
                    @endphp

                    <p class="text-lg text-green-900 dark:text-white"><strong> de nacimiento: </strong>{{ $formattedBirthdate }}</p>
                    <p class="text-lg text-green-900 dark:text-white"><strong>Edad:</strong> {{ $age === 0 ? 'N/A' : $age }}</p>
                    <p class="text-lg text-geen-900 dark:text-white"><strong>Número de contacto:</strong> {{$User->data_users->first()->cell ?? null}} </p>
                    <p class="text-lg text-geen-900 dark:text-white"><strong>Dirección de residencia:</strong> {{$User->data_users->first()->direccion ?? null}} </p>
                    <p class="text-lg text-geen-900 dark:text-white"><strong>Correo electronico:</strong> {{$User->email ?? null}} </p>


                </div>
            </div>
        </div>
            @can('Editar Usuarios')
            <div class="flex items-center p-3 m-5 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-target="#{{$User->id}}" data-modal-toggle="#{{$User->id}}" class="block w-full md:w-auto text-white bg-green-700 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-900 dark:hover:bg-green-800 dark:focus:ring-green-800 dark:border border-green-800" type="button">
                    Editar
                </button>
                @endcan
                @can('Eliminar Usuarios')
                <button data-modal-target="#delete{{$User->id}}" data-modal-toggle="#delete{{$User->id}}" class="block text-white bg-red-700 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-900 dark:hover:bg-red-800 dark:focus:ring-red-800 dark:border border-red-800" type="button">
                    Eliminar
                </button>
                @endcan

            </div>
        
        @include('dashboard.gestion_usuarios.modal_user')
    </div>



</div>
@endcan
@endsection