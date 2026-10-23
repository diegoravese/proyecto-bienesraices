<?php
function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'diego', '', 'bienesraices_crud');

    if (!$db) {
        echo 'Base de datos sin conexion';
        exit;
    }

    return $db;

}