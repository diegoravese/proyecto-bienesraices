<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

// Incluir templates al codigo

function incluirTemplate( string  $nombre, bool $inicio = false ) {
    include TEMPLATES_URL . "/${nombre}.php"; 
}

// Iniciar sesion

function estaAutenticado() {
    session_start();
    
    if(!$_SESSION['login']) {
        header('Location: /');
    }
}

// Debuguear codigo

function debuguear($variable) {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

// Escapar / Sanitizar el HTML

function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}