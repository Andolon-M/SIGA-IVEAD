<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 mb-auto">
   <div class="px-3 py-1 lg:px-5 lg:pl-3">
      <!--inicio barra navegacion-->
      <div class="flex items-center justify-between">
         <!--boton menu y nombre ive-->
         <div class="flex items-center justify-start">
            <!--boton menu -->
            <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
               <span class="sr-only">Open sidebar</span>
               <svg class="w-6 h-6 text-green-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
               </svg>
            </button>
            <!--nombre ive-->
            <a href="/" class="flex ml-2 md:mr-24">
               <x-application-logo class="h-8 mr-3" style="margin-inline-end: 10px" alt="IVE_logo" />
               <span class="self-center text-green-700 text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white mr-1 hidden sm:block">Iglesia</span>
               <span class="self-center text-gray-800 text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white hidden sm:block">Vida y Esperanza A.D</span>
            </a>
         </div>

         <!--opciones de nvegacion**********************************************-->
         <!--si el usuario esta autenticado se muestra lo siguiente-->
         @if (Route::has('login'))
         @auth

         <div class="h-16 flex justify-center items-center">

            <a id="tex_navbar3" href="{{ route('donaciones.index') }}" class="py-1 px-4 flex h-fit hover:border-2 hover:border-green-200 rounded-xl focus:ring-4 focus:ring-green-700 dark:focus:ring-green-900 text-green-700 hover:text-bg-white">
               <p class="text font-serif">
                  Donaciones
               </p>
            </a>

            <!--boton menu del usuario-->
            <button class="flex items-center justify-center h-fit py-1 px-3 space-x-2 bg-green-600 hover:bg-green-900 hover:text-white  rounded-full focus:ring-4 focus:ring-green-700 " aria-expanded="false" data-dropdown-toggle="dropdown-user">
               <p class="text-sm text-white  align-middle hidden sm:block " role="none"><strong>{{ Auth::user()->name }}</strong></p> <!--nombre del usuario-->
               <span class="sr-only">Open user menu</span>
               <!--se muestra la foto de perfil de usuario si esta disponible, de lo cotrario se muestra una imagen por defecto-->
               @if(Auth::user()->image === null)
               <svg class="w-8 h-8 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
               </svg>
               @else
               <img class="w-8 h-8 rounded-full align-middle" src="{{ Auth::user()->image }}" alt="user photo">
               @endif
            </button>


            <!--contenido del menu deplegable-->
            <div class="z-50 hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">

               <div class="grid grid-flow-col items-center">

                  <!--nombre y correo del usuario-->
                  <div class="px-4 py-3">
                     <p class="text-sm text-green-900 dark:text-white">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</p>
                     <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300">
                        {{ Auth::user()->email }}
                     </p>
                  </div>

                  <!--foto del usuario-->
                  <div class="flex items-center">
                     <!--se muestra la foto de perfil de usuario si está disponible, de lo contrario se muestra una imagen por defecto-->
                     @if(Auth::user()->image === null)
                     <svg class="w-12 h-12 text-green-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                     </svg>
                     @else
                     <img class="w-12 h-12 rounded-full align-middle" src="{{ Auth::user()->image }}" alt="user photo">
                     @endif
                  </div>

               </div>

               <!--opiones del menu-->
               <ul class="py-1" role="none">
                  <li>
                     <a href="{{route('profile.edit')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Mi cuenta</a>
                     <a href="{{route('dashboard.descubrir')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Portal SIGA</a>
                  </li>
                  <!--boton para cerrar sesion-->
                  <li>
                     <a data-modal-target="cerrar_session" data-modal-toggle="cerrar_session" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Cerrar Sesion</a>
                  </li>
               </ul>
            </div>

         </div>

         @else
         <!-- Esto se muestra solo cuando el usuario no está autenticado -->
         <div class="h-16 flex justify-center items-center">

            <a id="tex_navbar3" href="{{ route('donaciones.index') }}" class="py-1 px-4 flex h-fit hover:border-2 hover:border-green-200 rounded-xl focus:ring-4 focus:ring-green-700 dark:focus:ring-green-900 text-green-700 hover:text-bg-white">
               <p class="text font-serif">
                  Donaciones
               </p>
            </a>

            <a id="tex_navbar4" href="{{ route('login') }}" class="py-1 px-4 flex h-fit hover:border-2 hover:border-green-200 rounded-xl focus:ring-4 focus:ring-green-700 dark:focus:ring-green-900 text-green-700 hover:text-bg-white">
               <p class="text font-serif">
                  Iniciar Sesión
               </p>
            </a>

         </div>

         @endauth
         @endif

      </div>
   </div>
</nav>

<!--modal cerrar session-->
<div id="cerrar_session" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
   <div class="relative w-full max-w-md max-h-full">
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
         <!--modal header-->
         <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="cerrar_session">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
         </button>
         <!--modal body-->
         <div class="p-6 text-center">
            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" fill="none" viewBox="0 0 20 20">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <div class="col">
               <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Seguro que desea cerrar session?<br> <br> </h3>
               <!-- <p1 class="mb-5 text-sm font-normal text-gray-500 dark:text-gray-400">Esta accion no se podra revertir <br></p1>-->

               <!-- modal footer-->

               <form method="POST" action="{{ route('logout') }}" class="flex justify-center items-center ">
                  @csrf

                  <button data-modal-hide="cerrar_session" class="bg-red-600 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm text-white inline-flex items-center px-5 py-2.5 text-center mr-2">
                     Si. Cerrar Sesión
                  </button>
                  <button data-modal-hide="cerrar_session" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium  hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>

               </form>



            </div>
         </div>
      </div>
   </div>
</div>