@extends('layouts.app')


<body class="mt-5">

   @section('content')
   <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
      <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
         <ul class="space-y-2 font-medium">
            <li>
               <a href="{{route('dashboard.descubrir')}}" class="flex items-center p-2 rounded-lg group dark:text-white hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-900 text-green-900 {{ request()->routeIs('dashboard.descubrir') ? 'text-neutral-50 bg-green-700 dark:bg-green-800 hover:bg-green-800 hover:text-white  ': '' }}">
                  <svg class="w-5 h-5  transition duration-75 text-green-900 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-white {{ request()->routeIs('dashboard.descubrir') ? 'text-neutral-50 group-hover:text-white dark:text-white': ''}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                  </svg>
                  <span class="ml-3">Descubir</span>
               </a>
            </li>
            @can('Gestion Usuarios')
            <li>
               <a href="{{route('usuarios.index')}}" class="flex items-center p-2 rounded-lg group dark:text-white hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-900 text-green-900 {{ request()->routeIs('usuarios.index') ? 'text-neutral-50 bg-green-900 dark:bg-green-800 hover:bg-green-800 hover:text-white ': '' }}">
                  <svg class="w-5 h-5  transition duration-75 text-green-900 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-white {{ request()->routeIs('usuarios.index') ? 'text-neutral-50 group-hover:text-white dark:text-white': ''}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path d="M7.324 9.917A2.479 2.479 0 0 1 7.99 7.7l.71-.71a2.484 2.484 0 0 1 2.222-.688 4.538 4.538 0 1 0-3.6 3.615h.002ZM7.99 18.3a2.5 2.5 0 0 1-.6-2.564A2.5 2.5 0 0 1 6 13.5v-1c.005-.544.19-1.072.526-1.5H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h7.687l-.697-.7ZM19.5 12h-1.12a4.441 4.441 0 0 0-.579-1.387l.8-.795a.5.5 0 0 0 0-.707l-.707-.707a.5.5 0 0 0-.707 0l-.795.8A4.443 4.443 0 0 0 15 8.62V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.12c-.492.113-.96.309-1.387.579l-.795-.795a.5.5 0 0 0-.707 0l-.707.707a.5.5 0 0 0 0 .707l.8.8c-.272.424-.47.891-.584 1.382H8.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1.12c.113.492.309.96.579 1.387l-.795.795a.5.5 0 0 0 0 .707l.707.707a.5.5 0 0 0 .707 0l.8-.8c.424.272.892.47 1.382.584v1.12a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1.12c.492-.113.96-.309 1.387-.579l.795.8a.5.5 0 0 0 .707 0l.707-.707a.5.5 0 0 0 0-.707l-.8-.795c.273-.427.47-.898.584-1.392h1.12a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5ZM14 15.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5Z" />
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Gestion de usuarios</span>
                  <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300"></span>
               </a>
            </li>
            @endcan
            @can('Roles y Permisos')
            <li>
               <a href="{{route('roles-y-permisos.index')}}" class="flex items-center p-2 rounded-lg group dark:text-white hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-900 text-green-900 {{ request()->routeIs('roles-y-permisos.index') ? 'text-neutral-50 bg-green-900 dark:bg-green-800 hover:bg-green-800 hover:text-white ': '' }}">
                  <svg class="w-5 h-5  transition duration-75 text-green-900 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-white {{ request()->routeIs('roles-y-permisos.index') ? 'text-neutral-50 group-hover:text-white dark:text-white': ''}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3" />

                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Roles y permisos</span>
                  <span class="inline-flex items-center justify-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300"></span>
               </a>
            </li>
            @endcan
            @can('Gestion Equipos')
            <li>
               <a href="/equipos" class="flex items-center p-2 rounded-lg group dark:text-white hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-900 text-green-900 {{ request()->routeIs('equipos.index') ? 'text-neutral-50 bg-green-900 dark:bg-green-800 hover:bg-green-800 hover:text-white ': '' }}">
                  <svg class="w-5 h-5  transition duration-75 text-green-900 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-white {{ request()->routeIs('equipos.index') ? 'text-neutral-50 group-hover:text-white dark:text-white': ''}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                     <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Gestion de equipos</span>
               </a>
            </li>
            @endcan
            @can('Gestion Recursos')
            <li>
               <a href="/recursos" class="flex items-center p-2 rounded-lg group dark:text-white hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-900 text-green-900 {{ request()->routeIs('recursos.index') ? 'text-neutral-50 bg-green-900 dark:bg-green-800 hover:bg-green-800 hover:text-white ': '' }}">
                  <svg class="w-5 h-5  transition duration-75 text-green-900 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-white {{ request()->routeIs('recursos.index') ? 'text-neutral-50 group-hover:text-white dark:text-white': ''}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                     <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Gestion de recursos</span>
               </a>
            </li>
            @endcan
            @can('Gestion Eventos')
            <li class="hidden">
               <a href="#" class="flex items-center p-2 rounded-lg group dark:text-white hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-900 text-green-900 {{ request()->routeIs('') ? 'text-neutral-50 bg-green-900 dark:bg-green-800 hover:bg-green-800 hover:text-white ': '' }}">
                  <svg class="w-5 h-5  transition duration-75 text-green-900 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-white {{ request()->routeIs('') ? 'text-neutral-50 group-hover:text-white dark:text-white': ''}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path d="M0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm14-7.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm-5-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4Z" />
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Gestion de eventos</span>
               </a>
            </li>
            @endcan
            @can('Gestion Privilegios')
            <li class="hidden">
               <a href="#" class="flex items-center p-2 rounded-lg group dark:text-white hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-900 text-green-900 {{ request()->routeIs('') ? 'text-neutral-50 bg-green-900 dark:bg-green-800 hover:bg-green-800 hover:text-white ': '' }}">
                  <svg class="w-5 h-5  transition duration-75 text-green-900 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-white {{ request()->routeIs('') ? 'text-neutral-50 group-hover:text-white dark:text-white': ''}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                     <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v2H7V2ZM5 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0-4a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm8 4H8a1 1 0 0 1 0-2h5a1 1 0 0 1 0 2Zm0-4H8a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Z" />
                  </svg>
                  <span class="flex-1 ml-3 whitespace-nowrap">Gestion Privilegios</span>
               </a>
            </li>
            @endcan
            @can('Gestion Financiera')
            <li>
               <button type="button" class="cursor-pointer flex items-center w-full p-2 rounded-lg group dark:text-white hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-900 text-green-900 {{ request()->routeIs('financiera.index')  ? 'text-neutral-50 bg-green-900 dark:bg-green-800 hover:bg-green-800 hover:text-white ': '' }}">
                  <a href="/financiera" class="flex w-full">
                     <svg class="w-5 h-5  transition duration-75 text-green-900 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-white {{ request()->routeIs('financiera.index')  ? 'text-neutral-50 group-hover:text-white dark:text-white': ''}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                     </svg>
                     <span class="flex-1 ml-3 text-left whitespace-nowrap">Gestion Financiera</span>
                  </a>
                  <u class="flex justify-center cursor-pointer  w-full ml-2 p-2 rounded-lg group {{ request()->routeIs('reporte-semanal.index') || request()->routeIs('reporte-mensual.index') ? 'text-neutral-50 bg-green-800 hover:bg-green-300 hover:text-white ': 'dark:text-white bg-gray-300 hover:bg-green-300 hover:text-green-900 dark:hover:bg-green-900 text-green-900 ' }}" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                     </svg>
                  </u>

               </button>
               <ul id="dropdown-example" class=" {{ request()->routeIs('financiera.index') || request()->routeIs('reporte-semanal.index') || request()->routeIs('reporte-mensual.index') ? ' ': 'hidden' }} py-2 space-y-2">
                  <li>
                     <a href="/reporte-semanal" class="flex items-center p-2 rounded-lg group dark:text-white hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-900 text-green-900 {{ request()->routeIs('reporte-semanal.index') ? 'text-neutral-50 bg-green-900 dark:bg-green-800 hover:bg-green-800 hover:text-white ': '' }}">
                        <svg class="w-5 h-5  transition duration-75 text-green-900 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-white {{ request()->routeIs('reporte-semanal.index')  ? 'text-neutral-50 group-hover:text-white dark:text-white': ''}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 21">

                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1v3m5-3v3m5-3v3M1 7h18M5 11h10M2 3h16a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1Z" />

                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Reportes semanales</span>
                     </a>
                  </li>

                  <li>
                     <a href="/reporte-mensual" class="flex items-center p-2 rounded-lg group dark:text-white hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-900 text-green-900 {{ request()->routeIs('reporte-mensual.index') ? 'text-neutral-50 bg-green-900 dark:bg-green-800 hover:bg-green-800 hover:text-white ': '' }}">
                        <svg class="w-5 h-5  transition duration-75 text-green-900 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-white {{ request()->routeIs('reporte-mensual.index') ? 'text-neutral-50 group-hover:text-white dark:text-white': ''}}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 21">

                           <path fill="currentColor" d="M6 1a1 1 0 0 0-2 0h2ZM4 4a1 1 0 0 0 2 0H4Zm7-3a1 1 0 1 0-2 0h2ZM9 4a1 1 0 1 0 2 0H9Zm7-3a1 1 0 1 0-2 0h2Zm-2 3a1 1 0 1 0 2 0h-2ZM1 6a1 1 0 0 0 0 2V6Zm18 2a1 1 0 1 0 0-2v2ZM5 11v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 11v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM10 15v-1H9v1h1Zm0 .01H9v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 15v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM15 11v-1h-1v1h1Zm0 .01h-1v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM5 15v-1H4v1h1Zm0 .01H4v1h1v-1Zm.01 0v1h1v-1h-1Zm0-.01h1v-1h-1v1ZM2 4h16V2H2v2Zm16 0h2a2 2 0 0 0-2-2v2Zm0 0v14h2V4h-2Zm0 14v2a2 2 0 0 0 2-2h-2Zm0 0H2v2h16v-2ZM2 18H0a2 2 0 0 0 2 2v-2Zm0 0V4H0v14h2ZM2 4V2a2 2 0 0 0-2 2h2Zm2-3v3h2V1H4Zm5 0v3h2V1H9Zm5 0v3h2V1h-2ZM1 8h18V6H1v2Zm3 3v.01h2V11H4Zm1 1.01h.01v-2H5v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H5v2h.01v-2ZM9 11v.01h2V11H9Zm1 1.01h.01v-2H10v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM9 15v.01h2V15H9Zm1 1.01h.01v-2H10v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H10v2h.01v-2ZM14 15v.01h2V15h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM14 11v.01h2V11h-2Zm1 1.01h.01v-2H15v2Zm1.01-1V11h-2v.01h2Zm-1-1.01H15v2h.01v-2ZM4 15v.01h2V15H4Zm1 1.01h.01v-2H5v2Zm1.01-1V15h-2v.01h2Zm-1-1.01H5v2h.01v-2Z" />

                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Reportes mensuales</span>
                     </a>
                  </li>
               </ul>
            </li>
            @endcan

         </ul>
      </div>
   </aside>
   <div class="pt-16 pb-4 px-4 sm:ml-64">
      <div class="mt-1 py-2 max-w-full px-2 lg:px-4 space-y-4   border-2 border-gray-200 border-dashed rounded-lg text-green-900 dark:text-neutral-50 dark:border-gray-700">
         @if(session('success'))
         <div class="bg-green-500 rounded-lg shadow-md p-4 m-5">
            <div>
                  <p class="text-white font-style: italic;"> {!! session('success') !!}</p>
            </div>
         </div>
         @endif

         @yield('panel')

      </div>
   </div>
</body>

@endsection