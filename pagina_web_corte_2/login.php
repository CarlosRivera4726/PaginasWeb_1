<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>

<body>
    <?php
    include "static/navBar.php";
    include "controllers/UserController.php";

    if (isset($_POST['validacion'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        /* llamado a base de datos */
        $userController = new UserController();
        $user = $userController->login($email);
        var_dump($email);
        var_dump($user);
        $passwordUser = $user->getPassword();


        if (($user != null) && password_verify($password, $passwordUser)) {
            // autenticacion exitosa
            session_status_check();
            $_SESSION['id'] = $user->getId();
            $_SESSION['nombre'] = $user->getNombre();
            $_SESSION['apellido'] = $user->getApellido();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['genero'] = $user->getGenero();
            $_SESSION['es_vendedor'] = $user->getEsVendedor();
            $url_limpia = obtenerUrlLimpia();
            header("Location: " . $url_limpia . "/index.php");
        } else {

        }

    } else {
        echo '
            <div class="container">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="email">Correo Electrónico:</label>
                        <input class="form-control" type="email" name="email" placeholder="email@mail.com" required><br>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Contraseña:</label>
                        <input class="form-control" type="password" name="password" placeholder="*********" required><br>
                    </div>
                    <div class="form-group mb-3">
                        <input class="btn btn-primary" type="submit" value="Enviar" name="validacion">
                    </div>
                </form>
            </div>
        ';

    }
    ?>


</body>

</html>