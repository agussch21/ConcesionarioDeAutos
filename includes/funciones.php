<?php

function limpiar($texto)
{
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

function formato_precio($numero)
{
    return '$' . number_format($numero, 0, ',', '.');
}

function buscar_vehiculo($vehiculos, $id)
{
    foreach ($vehiculos as $vehiculo) {
        if ($vehiculo['id'] == $id) {
            return $vehiculo;
        }
    }
    return false;
}

function dato_post($campo)
{
    if (isset($_POST[$campo]) && is_string($_POST[$campo])) {
        return trim($_POST[$campo]);
    }
    return '';
}

function dato_get($campo)
{
    if (isset($_GET[$campo]) && is_string($_GET[$campo])) {
        return trim($_GET[$campo]);
    }
    return '';
}

function para_archivo($texto)
{
    return str_replace(['|', "\r", "\n"], ' ', $texto);
}
