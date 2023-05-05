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

        if (($user != null)) {
            $passwordUser = $user->getPassword();
            if (password_verify($password, $passwordUser)) {
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
                echo '
                    <div class="container alert alert-danger">
                        <p>contraseña erronea o email erroneo!</p>
                    </div>
                ';
                echo form_login();
            }


        } else {
            echo '
                <div class="container alert alert-danger">
                    <p>mail erroneo o no registrado!</p>
                </div>
            ';
            echo form_login();
        }

    } else {
        echo form_login();

    }
    ?>


</body>

</html>