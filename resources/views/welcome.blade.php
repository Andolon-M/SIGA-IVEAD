@extends('layouts.page')

@section('content')
<div class=" space-y-3">
    <!--carrcel-->
    <div id="default-carousel" class="relative h-auto w-full  " data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class=" relative h-56 overflow-hidden rounded-b-lg sm:h-min md:h-96 lg:h-[520px]">
            <!-- Item 1 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/PORTADA_IVE 2022.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/carrusel (1).jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <a title="Clic para ir al video." target="_blank" href="{{ $videoNuevo->url ?? 'https://www.youtube.com/@IglesiaVidayEsperanza_A.D/about' }}">
                    <img src="{{ asset('images/privilegio de servir.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </a>
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/preparados2024.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="{{ asset('images/foto ive.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

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
            <div class="rounded-lg shadow-lg bg-white flex justify-center items-center flex-col w-full h-full pt-3">
                <ul>
                    <h1 class="inset-0 flex items-center justify-center text-5xl text-green-600"><strong>Exploradores del Rey</strong></h1>
                </ul>
                <div class="flex items-center justify-center flex-wrap p-4 w-full ">
                    <div class="flex flex-wrap space-x-2 space-y-2 w-full items-center justify-center">
                        <div class="w-3/4">
                            <p class="text-xl text-green-800 m-4 p-1">
                                En la iglesia vida y esperanza trabajamos con el ministerio infantil
                                exploradores del rey, un ministerio infantil cristiano que se centra en el crecimiento integral de los niños. El programa está diseñado para ayudar a los niños a desarrollar su fe, sus habilidades y su carácter.
                                <br>  <br>
                                Exploradores del Rey, es un ministerio mundial organizado por Royal Rangers International (RRI). RRI es una organización sin fines de lucro que tiene su sede en los Estados Unidos. RRI proporciona recursos y apoyo a los líderes de Exploradores del Rey en todo el mundo.
                            </p>
                        </div>
                        <div class="ml-auto rounded-full shadow p-4 h-auto">
                            <img src="{{ asset('images/Logo Exploradores.svg') }}" alt="" class="h-56 ">
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
                <div>
                    <ul>
                        <h1 class="inset-0 flex items-center justify-center text-5xl text-green-600"><strong>Donaciones</strong></h1>
                    </ul>
                    <div class="flex items-center justify-center flex-wrap p-4 w-full ">
                        <div class="flex flex-wrap space-x-2 space-y-2 w-full items-center justify-center">

                            <a href="{{route('donaciones.index')}}" class="items-center justify-center rounded-full shadow p-4 h-auto">
                                <img src="{{ asset('images/Mercado-Pago-Logo.png') }}" alt="" class="h-16 ">
                            </a>
                            <!-- Modal toggle -->
                            <a data-modal-target="nequi-modal" data-modal-toggle="nequi-modal" class="items-center justify-center rounded-full shadow p-4 h-auto">
                                <img src="{{ asset('images/nequi.svg') }}" alt="" class="h-10 ">
                            </a>

                            <!-- Main modal -->
                            <div id="nequi-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                haz tu donacion mediante Nequi
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="nequi-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="md:p-2 space-y-4">
                                            <div class=" flex justify-center align-middle">
                                                <img src="{{ asset('images/Nequi QR.jpg') }}" alt="" class="h-auto ">
                                            </div>


                                        </div>
                                        <!-- Modal footer -->
                                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                            <button data-modal-hide="nequi-modal" type="button" class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>

            <div class="rounded-lg shadow-lg bg-white flex justify-center items-center flex-wrap w-full h-full px-20 pt-3">
                <div class="">
                    <ul>
                        <h1 class="inset-0 flex items-center justify-center text-5xl text-green-600"><strong>Encuentrenos</strong></h1>
                    </ul>
                    <div class="flex items-center justify-center flex-wrap p-4 w-full ">
                    <iframe class=" flex w-auto" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.783146153586!2d-73.13686042593228!3d7.151054415554633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e6815082547897b%3A0xdab9ebd74d1b0814!2sIglesia%20Vida%20y%20Esperanza%20de%20las%20Asambleas%20de%20Dios!5e0!3m2!1ses-419!2sco!4v1701872484534!5m2!1ses-419!2sco"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <p class="text-xl text-green-800 m-4 p-1">
                                Cra 12 #14 Norte - 66 piso 2 Barrio Kennedy, Bucaramanga</p>
                    </div>

                </div>
                
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
                <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Versión 0.0.1</a>. All Rights Reserved.</span>
            </div>
        </footer>
        <!--fin footer-->

    </div>

    @endsection