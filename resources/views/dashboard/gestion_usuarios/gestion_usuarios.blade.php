@extends('/layouts.dashboard')
@section('panel')

<h1><strong>PANEL GESTION DE USUARIOS</strong></h1> <!--titulo de la seccion -->
<div class="relative overflow-x-auto shadow-md sm:rounded-lg dark:bg-gray-800  ">

    <div>
        @livewire('Dashboard.GestionUsuarios.tablaUsuarios')
    </div>

</div>

@endsection