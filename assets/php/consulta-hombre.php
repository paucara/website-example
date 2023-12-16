<?php
// Conectarnos a la base de datos
$mysqli = new mysqli("localhost", "root", "", "gardenshop_db");
// Realizar la consulta
$sql = "SELECT * FROM productos WHERE tipo = 'M'";
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
?>
