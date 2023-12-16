<?php

// Conexión a la base de datos
if (isset($_POST['submit'])) {
    $db = new PDO("mysql:host=localhost;dbname=gardenshop_db", "root", "");

    // Obtención de los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Variable para iniciar sesion
    $login = true;

    // Comprobación de que el usuario existe
    $query = $db->prepare("SELECT * FROM usuarios WHERE username = :username");
    $query->bindParam(":username", $username);
    $query->execute();
    $user = $query->fetch();

    if (!$user) {
        echo '<script>alert("El usuario no existe")</script>';
        $login = false;
    } else {
        $password_hash = $user['password'];
        if (!password_verify($password, $password_hash)) {
            echo '<script>alert("Contraseña incorrecta")</script>';
            $login = false;
        }
    }
    // Comprobación de la contraseña
    if ($login) {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: index.php");
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
    <title>Login - SB Admin</title>
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
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-2">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Iniciar Sesion</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post">
                                        <div id="username-box" class="form-floating mb-3">
                                            <input class="form-control" name="username" id="inputUsername" type="text"
                                                placeholder="username" />
                                            <label for="inputUsername">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="inputPassword"
                                                type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                           
                                            <input type="submit" name="submit" class="btn btn-success btn-lg"
                                                value="Iniciar sesion">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.php">¿No tienes una cuenta? ¡Registrate!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>