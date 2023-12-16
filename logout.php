<?php

// Inicio de sesión
session_start();

// Eliminación de la sesión
session_destroy();

// Redirección al inicio
header("Location: public.php");

?>