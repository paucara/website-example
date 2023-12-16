<?php

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "gardenshop_db";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

//Recupero el usuario actual en sesion NECESITO INCIAR SECION PARA ACCEDER A VARIABLES GLOBALE
session_start();
$nombre_de_usuario = $_SESSION['username'];


// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT c.id
        FROM clientes AS c
        JOIN usuarios AS u ON c.username = u.username
        WHERE u.username = '$nombre_de_usuario'";

// Ejecutar la consulta
$cliente = $conn->query($sql);


if ($cliente) {
   // Obtiene la fila de resultado como un objeto asociativo
   $row = $cliente->fetch_assoc();
   // Extrae el valor numérico y lo convierte en un entero
   $cliente_id = intval($row['id']);
}

// Cerrar la conexión
$conn->close();

// Conexión a la base de datos
if (isset($_GET['total'])) {
   $total = $_GET['total'];
}


if (isset($_POST['submit'])) {

    $db = new PDO("mysql:host=localhost;dbname=gardenshop_db", "root", "");

    // Obtención de los datos del formulario
    $fecha = $_POST["fecha"];

    // Insercion en la tabla facturas
    $query = $db->prepare("INSERT INTO facturas (cliente_id, fecha, total) VALUES (:cliente_id, :fecha, :total)");
    $query->bindParam(":cliente_id", $cliente_id);
    $query->bindParam(":fecha", $fecha);
    $query->bindParam(":total", $total);
    $query->execute();

    echo '<script>alert("El pago se ha realizado con exito")</script>';
}
?>


<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Página de Pago</title>
      <link rel="stylesheet" href="assets/css/bootstrap.css">
   </head>
   <body>
      <button class="btn btn-primary mt-4 "><a class="text-reset text-decoration-none" href="index.php">Volver</a></button>
      <div class="mx-4 my-2">
      
         <h1>Procesamiento de Pago</h1>
         <form action="" method="post">
            <div class="mb-2">
               <label for="nombre" class="form-label">Nombre del titular</label>
               <input class="form-control" type="text" id="nombre" name="nombre" required><br>
            </div>
            <div class="mb-2">
               <label for="email" class="form-label">Direccion de correo electronico</label>
               <input class="form-control" type="text" id="email" name="email" required><br>
            </div>
            <div class="mb-2">
               <label for="telefono" class="form-label">Numero de telefono</label>
               <input class="form-control" type="text" id="telefono" name="telefono" required><br>
            </div>
            <div class="mb-2">
               <label for="fecha" class="form-label">Fecha</label>
               <input class="form-control" type="datetime-local" id="fecha" name="fecha" required><br>
            </div>
            <div class="mb-2">
               <label for="monto" class="form-label">Monto a pagar:</label>
               <span class="fw-bolder">$<?php echo $total;?>
               </span><br>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Pagar</button>
         </form>
      </div>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/pago.js"></script>
   </body>
</html>