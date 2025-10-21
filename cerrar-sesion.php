<?php

session_start();

$_SESSION = []; // Reescribimos el array de sesion, si esta vacio, no hay sesion.

header('location: /');