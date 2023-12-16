<?php
if (isset($_POST['submit'])) {
    $register = true;
    // Conexión a la base de datos
    $db = new PDO("mysql:host=localhost;dbname=gardenshop_db", "root", "");
    // Obtención de los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];

    // Comprobación de que el nombre de usuario no existe
    $query = $db->prepare("SELECT * FROM usuarios WHERE username = :username");
    $query->bindParam(":username", $username);
    $query->execute();
    $user = $query->fetch();
    if ($user) {
        // Error de registro
        echo '<script>alert("El nombre de usuario ya existe")</script>';
        $register = false;
    }

    // Comprobación de que la contraseña es válida
    if (strlen($password) < 8) {
        // Error de registro
        echo "La contraseña debe tener al menos 8 caracteres.";
        return;
    }

    // Comprobación de que el correo electrónico es válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Error de registro
        echo "El correo electrónico no es válido.";
        return;
    }

    if($register){
        // Encriptación de la contraseña
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Inserción del usuario en la base de datos
        $query = $db->prepare("INSERT INTO usuarios (username, password, email) VALUES (:username, :password, :email)");
        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);
        $query->bindParam(":email", $email);
        $query->execute();

        // Insercion del cliente en la base de datos
        $query = $db->prepare("INSERT INTO clientes (nombre, apellido, telefono, username) VALUES (:name, :surname, :phone, :username)");
        $query->bindParam(":name", $name);
        $query->bindParam(":surname", $surname);
        $query->bindParam(":phone", $phone);
        $query->bindParam("username", $username);
        $query->execute();

        header('Location: public.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-logo">
    <nav class="navbar navbar-light bg-logo">
        <a class="navbar-brand" href="index.php">
            <img src="assets/img/logo.png" alt="Logo de tu sitio web" class="w-50">
        </a>
    </nav>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-2">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Crear Cuenta</h3>
                                </div>
                                <div class="card-body">
                                    <form id="myForm" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="username" id="inputUsername" type="text"
                                                placeholder="username" />
                                            <label for="inputUsername">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="name" id="inputName" type="text"
                                                placeholder="nombre" />
                                            <label for="inputUsername">Nombre</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="surname" id="inputSurname" type="text"
                                                placeholder="apellido" />
                                            <label for="inputUsername">Apellido</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="phone" id="inputNumber" type="text"
                                                placeholder="Numero de telefono" />
                                            <label for="inputUsername">Numero de telefono</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" id="inputEmail" 
                                                placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="password" id="inputPassword"
                                                        type="password" placeholder="Create a password" />
                                                    <label for="inputPassword">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm"
                                                        type="password" placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <input type="submit" name="submit" class="btn btn-success btn-lg"
                                                value="Registrar">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="login.php">¿Ya tienes una cuenta? ¡Inicia sesion!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="assets/js/register.js"></script>
</body>
</html>