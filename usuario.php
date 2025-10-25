<?php

// Importar la conexión
require 'includes/config/database.php';
$db = conectarDB(); 

// Crear email y password del usuario
$email= "correo@correo.com";
$password = "123456";

// Hashear password
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

// Query para crear usuarios
$query = " INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash'); ";

// Agrega el usuario a la base de datos
mysqli_query($db, $query);