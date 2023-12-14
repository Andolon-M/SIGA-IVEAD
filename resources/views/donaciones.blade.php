@extends('layouts.app')

@section('content')
<!--// SDK MercadoPago.js-->
<script src="https://sdk.mercadopago.com/js/v2"></script>

<?php
// SDK de Mercado Pago

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
// Agrega credenciales
MercadoPagoConfig::setAccessToken(config('services.mercadopago.token'));


$client = new PreferenceClient();
$preference = $client->create([
    "items" => array(
        array(
            "id" => "wallet_container",
            "title" => "Ofrenda o diezmo",
            "quantity" => 1,
            "currency_id" => "COP",
            "unit_price" => 20000
        )
    )



]);
//dd($preference);

?>


<!--Contenido-->
<div class=" flex flex-col h-auto space-y-3">

    <!--Contenido Principal-->
    <div class=" ">
        <!--formulario donaciones-->
        <div class="mx-4">
            <div class="w-full mt-20 ">
                <div class="rounded-lg shadow-lg bg-white flex justify-center items-center flex-col w-full h-full pt-3">
                    <ul>
                        <h1 class="inset-0 flex items-center justify-center text-5xl text-green-600"><strong>Donaciones</strong></h1>
                    </ul>
                    <div class="flex items-center justify-center flex-wrap p-4 w-full ">

                        <form action="">
                            @csrf <!-- Agrega el token CSRF para protección -->
                            <div class="flex flex-wrap sm:flex-nowrap space-x-6">
                                <div class="mx-2 my-2 rounded-lg py-4 px-2  dark:bg-gray-800 space-y-4">

                                    <!-- Valor de donacion --> <!-- Numero de documento -->
                                    <div class="grid grid-cols-2">
                                        <div class="mx-1 col-sm-4">

                                            <label for="type_donor_id" class="block mb-2 text-sm font-medium text-green-900 dark:text-gray-300">Tipo de documento</label>
                                            <select id="type_donor_id" name="type_donor_id" wire:model.blur="type_donor_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 ">
                                                <option value="null">---Seleccione---</option>
                                                <option value="TI">Tarjeta de identidad</option>
                                                <option value="CC">Cedula de ciudadanía</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('type_donor_id')" class="mt-2" />
                                        </div>
                                        <div class="mx-1 col-sm-8">

                                            <label for="donor_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Numero de documento</label>
                                            <div class="">
                                                <input type="number" id="donor_id" name="donor_id" wire:model.live="donor_id" class="shadow-sm bg-gray-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-700 dark:focus:border-green-700 " placeholder="1234567891">
                                                <x-input-error :messages="$errors->get('donor_id')" class="mt-2 max:sm" />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Nombre -->
                                    <div>
                                        <label for="donor_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nombre</label>
                                        <input type="text" id="donor_name" name="donor_name" wire:model.blur="donor_name" class="shadow-sm bg-gray-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 " placeholder="Ingrese el nombre aquí">
                                        <x-input-error :messages="$errors->get('donor_name')" class="mt-2" />
                                    </div>

                                    <!-- Tipo de donacion -->
                                    <div class="col-sm-4">
                                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tipo de Ofrenda</label>
                                        <select id="type" name="type" wire:model.blur="type" class="shadow-sm bg-gray-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 ">
                                            <option value="">---Seleccionar---</option>
                                            <option value="Ofrenda">Ofrenda</option>
                                            <option value="Diezmo">Diezmo</option>
                                            <option value="Ofrenda Especial">Ofrenda Especial</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                                    </div>

                                    <!-- Valor de donacion -->
                                    <div>
                                        <label for="value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Valor</label>
                                        <input type="number" id="value" name="value" wire:model.blur="value" class="shadow-sm bg-gray-50 border border-green-300 text-green-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-900 dark:border-green-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 " placeholder="$0">
                                        <x-input-error :messages="$errors->get('value')" class="mt-2" />
                                    </div>

                                </div>

                                <div id="wallet_container" class="flex flex-col justify-start shadow-sm py-2 px-4 space-y-3">
                                    <p class="inset-0 flex items-center justify-center text-3xl text-green-600"><strong>Paga con:</strong></p>
                                    <a class="items-center justify-center rounded-3xl shadow px-2 h-min">
                                        <img src="{{ asset('images/Mercado-Pago-Logo.png') }}" alt="" class="h-32 ">
                                    </a>
                                </div>


                            </div>



                        </form>



                    </div>
                </div>
            </div>
        </div>

    </div>



    <!--footer-->
    <footer class="bg-white rounded-lg shadow dark:bg-gray-900">

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


<script>
    const mp = new MercadoPago(config('services.mercadopago.key'));
    const bricksBuilder = mp.bricks();


    mp.bricks().create("wallet", "wallet_container", {
        initialization: {
            preferenceId: "$preference->id",
        },
    });
</script>





@endsection