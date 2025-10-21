<?php
function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', '', 'bienesraices_crud');

    if (!$db) {
        echo 'Base de datos sin conexion';
        exit;
    }

    return $db;

}