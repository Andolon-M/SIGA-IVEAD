@extends('layouts.app')

@section('content')
<div class=" space-y-3">
   

    <!--Contenido-->
    <div class="mx-10  flex justify-center align-middle flex-col h-auto space-y-3">
        <!--quienes somos-->
        <div class="w-full ">
            <div class="rounded-lg shadow-lg bg-white flex justify-center items-center flex-col w-full h-full pt-3">
                <ul>
                    <h1 class="inset-0 flex items-center justify-center text-5xl text-green-600"><strong>¿Quienes Somos?</strong></h1>
                </ul>
                <div class="flex items-center justify-center flex-wrap p-4 w-full ">
                    <div class="flex items-center justify-between">
                        <div class="w-1/4 mr-2">
                            <img src="{{ asset('images/Logo AD curvas.svg') }}">
                        </div>

                        <div class="w-3/4">
                            <p class="text-2xl text-green-800 m-4 p-1">
                                Somos una iglesia del
                                Concilio de las Asambleas de Dios
                                de Colombia
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--Mision/Vision-->
        <div>
            <div class="rounded-lg shadow-lg bg-white flex justify-center align-middle w-full h-fit flex-wrap sm:flex-nowrap">
                <div class="w-full flex flex-col px-4 my-3">
                    <div class="relative rounded-full overflow-hidden h-40 ">
                        <div class="relative justify-center align-middle">
                            <img src="{{ asset('images/Mision.jpg') }}" alt="" class="w-full ">
                            <div class="absolute inset-0 bg-gray-950 opacity-60"></div>
                        </div>
                        <h1 class="absolute inset-0 flex items-center justify-center text-6xl text-white"><strong>Misión</strong></h1>
                    </div>
                    <p class="text-lg text-green-900 px-10 pt-5">

                    somo una iglesia que proclama y enseña la palabra de Dios, practica el servicio,
                    cultiva la comunión e inspira a sus miembros a la adoración.

                    </p>
                </div>
                <ul class="border my-4 mx-1"></ul>
                <div class="w-full flex flex-col px-4 my-3">
                    <div class="relative rounded-full overflow-hidden  h-40 ">
                        <div class="relative justify-center align-middle">
                            <img src="{{ asset('images/Vision.jpg') }}" alt="" class="w-full ">
                            <div class="absolute inset-0 bg-gray-950 opacity-60"></div>
                        </div>
                        <h1 class="absolute inset-0 flex items-center justify-center text-6xl text-white"><strong>Visión</strong></h1>
                    </div>
                    <p class="text-lg text-green-900 px-10 pt-5">
                        Hacemos discípulos
                        para Jesús que sirvan a
                        Dios en la familia, iglesia
                        y comunidad.

                    </p>
                </div>
            </div>
        </div>
        <!--Valores-->
        <div class="w-full h-auto">
            <div class="rounded-lg shadow bg-white flex justify-center items-center flex-col w-full h-full pt-3">
                <ul>
                    <h1 class="inset-0 flex items-center justify-center text-5xl text-green-600"><strong>Nuestros valores</strong></h1>
                </ul>
                <div class="flex items-center justify-center flex-wrap p-4 w-full">
                    <div class="flex space-x-2 space-y-2 flex-wrap w-full lg:flex-nowrap">
                        <div class="flex flex-col border-4 rounded-xl p-2 lg:w-1/6 items-center sm:w-1/2 xl:w-1/6">
                            <h2 class="text-center text-green-700 text-3xl font-semibold">Conversión</h2>
                            <p class="text-center text-green-800 text-md mt-2">Conociendo a Jesús disfrutaremos de su Reino</p>
                            <p class="text-right w-full text-green-700 text-4xl font-bold">1</p>
                        </div>

                        <div class="flex flex-col border-4 rounded-xl p-2 lg:w-1/6 items-center sm:w-1/2 xl:w-1/6">
                            <h2 class="text-center text-green-700 text-3xl font-semibold">Crecimiento</h2>
                            <p class="text-center text-green-800 text-md mt-2">Crecemos sirviendo a Dios</p>
                            <p class="text-right w-full text-green-700 text-4xl font-bold">2</p>
                        </div>

                        <div class="flex flex-col border-4 rounded-xl p-2 lg:w-1/6 items-center sm:w-1/2 xl:w-1/6">
                            <h2 class="text-center text-green-700 text-3xl font-semibold">Devoción</h2>
                            <p class="text-center text-green-800 text-md mt-2">A mayor Devoción, mayor consagración</p>
                            <p class="text-right w-full text-green-700 text-4xl font-bold">3</p>
                        </div>

                        <div class="flex flex-col border-4 rounded-xl p-2 lg:w-1/6 items-center sm:w-1/2 xl:w-1/6">
                            <h2 class="text-center text-green-700 text-3xl font-semibold">Relación</h2>
                            <p class="text-center text-green-800 text-md mt-2">Las buenas relaciones nos hacen sociables</p>
                            <p class="text-right w-full text-green-700 text-4xl font-bold">4</p>
                        </div>

                        <div class="flex flex-col border-4 rounded-xl p-2 lg:w-1/6 items-center sm:w-1/2 xl:w-1/6">
                            <h2 class="text-center text-green-700 text-3xl font-semibold">Multiplicación</h2>
                            <p class="text-center text-green-800 text-md mt-2">Somos llamados a multiplicarnos</p>
                            <p class="text-right w-full text-green-700 text-4xl font-bold">5</p>
                        </div>

                        <div class="flex flex-col border-4 rounded-xl p-2 lg:w-1/6 items-center sm:w-1/2 xl:w-1/6">
                            <h2 class="text-center text-green-700 text-3xl font-semibold">Obra Social</h2>
                            <p class="text-center text-green-800 text-md mt-2">Presentamos el amor de Dios a través de la Obra Social</p>
                            <p class="text-right w-full text-green-700 text-4xl font-bold">6</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>


       
        <div class="w-full ">
            <div class="rounded-lg shadow-lg bg-white flex justify-center items-center flex-wrap w-full h-full px-20 pt-3">
                <div class="">
                    <ul>
                        <h1 class="inset-0 flex items-center justify-center text-5xl text-green-600"><strong>Contacto</strong></h1>
                    </ul>
                    <div class="flex items-center justify-center flex-wrap p-4 w-full ">
                        <div class="flex flex-wrap space-x-2 space-y-2 w-full items-center justify-center">

                            <a href="https://youtube.com/@IglesiaVidayEsperanza_A.D?si=299du_1GP8F97vxh" target="_blank" class="items-center justify-center rounded-full shadow p-4 h-auto">
                                <img src="{{ asset('images/youtube.svg') }}" alt="" class="h-10 ">
                            </a>
                            <a href="https://facebook.com/vidayesperanza.AD" target="_blank" class="items-center justify-center rounded-full shadow p-4 h-auto">
                                <img src="{{ asset('images/facebook.svg') }}" alt="" class="h-10 ">
                            </a>
                            <a href="https://wa.me/573173756918" target="_blank" class="items-center justify-center rounded-full shadow p-4 h-auto">
                                <img src="{{ asset('images/WhatsAppButtonGreenLarge.svg') }}" alt="" class="h-10 ">
                            </a>
                        </div>
                    </div>

                </div>
                <ul class="border my-4 mx-1"></ul>
                
            </div>


            <button id="scrollToTopBtn" class="fixed bottom-4 right-4 px-4 py-2 bg-green-600 text-white rounded-full hover:bg-green-800 scroll-trigger">
                Ir arriba
            </button>
            <!--fin Contenido-->
        </div>
        <!--footer-->
        <footer class="bg-white rounded-lg shadow dark:bg-gray-900 ">
            <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a href="/" class="flex items-center mb-4 sm:mb-0">


                        <svg class="w-16 h-16 dark:bg-white  rounded-full" xmlns="http://www.w3.org/2000/svg">
                            <img id="logo-image" src="{{ asset('images/Logo Oficial curvas.svg') }}" alt="IVE_logo" class="h-16 mr-3" style="margin-inline-end: 10px" />
                        </svg>
                        <div class="flex flex-wrap">
                            <p class="self-center text-name1 text-white text-xl font-semibold sm:text-2xl dark:text-white mr-1 hidden sm:block">Iglesia</p>
                            <p class="self-center text-name2 text-white text-xl font-semibold sm:text-2xl dark:text-white hidden sm:block">Vida y Esperanza</p>
                        </div>

                    </a>
                    <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6 ">Politica de Privacidad.</a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6"></a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6 "></a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline"></a>
                        </li>
                    </ul>
                </div>
                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.</span>
            </div>
        </footer>
        <!--fin footer-->

    </div>

    @endsection