<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $mysqli = new mysqli("localhost", "root", "", "gardenshop_db");
    
    if ($mysqli->connect_error) {
        die("Error de conexión: " . $mysqli->connect_error);
    }
    
    $query = "SELECT * FROM productos WHERE id = " . $id;
    $result = $mysqli->query($query);
    
    if ($result) {
        // Obtener los datos de la consulta como un arreglo asociativo
        $data = $result->fetch_assoc();
        
        // Convertir los resultados a JSON
        $json_result = json_encode($data);
        
        // Establecer la cabecera de respuesta como JSON
        header('Content-Type: application/json');
        
        // Imprimir el resultado JSON
        echo $json_result;
    } else {
        echo json_encode(["error" => "Error en la consulta: " . $mysqli->error]);
    }
    
    $mysqli->close();
} else {
    echo json_encode(["error" => "No se proporcionó un ID válido en la URL."]);
}
?>
