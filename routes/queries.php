<?php
// routes/queries.php

use App\Models\Resource;

use App\Models\DataUser;


// Validaciones para los videos de la vista "descubrir"**************************************************
// Consulta para obtener el video más nuevo
function getNewestVideo() {
    $tipo = "Servicio Dominical";
    return Resource::where('tipo', $tipo)
        ->orderBy('id', 'desc')
        ->first();
}
// Consulta para obtener los videos más antiguos
function getOlderVideos() {
    $tipo = "Servicio Dominical";
    return Resource::where('tipo', $tipo)
        ->orderBy('id', 'desc')
        ->take(5)
        ->get();
}

function getAllUsers() {
    $users = DataUser::all();
    return $users;
}

