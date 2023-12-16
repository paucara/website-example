<?php

if (isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];

    $genero = $_GET['genero'];
        
    // Conectarnos a la base de datoss
    $mysqli = new mysqli("localhost", "root", "", "gardenshop_db");
    // Realizar la consulta

    $sql = "SELECT * FROM productos WHERE tipo = '$genero' AND nombre LIKE '$buscar%'";

    $resultado = $mysqli->query($sql);
    // Convertir los resultados de la consulta a un array
    $usuarios = array();
    while ($fila = $resultado->fetch_assoc()) {
        $usuarios[] = $fila;
    }
    // Convertir el array a una cadena JSON
    $json = json_encode($usuarios);
    // Devolver la cadena JSON
    echo $json;
} else {
    echo json_encode(["error" => "No se proporcionó un ID válido en la URL."]);
}
?>


