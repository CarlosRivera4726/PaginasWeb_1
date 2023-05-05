<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casas en Venta</title>
</head>

<body>
    <?php
    include_once "database/connection.php";
    require_once "static/navBar.php";
    include_once "controllers/TerrenoController.php";
    include_once "controllers/VendedorController.php";
    include_once "controllers/UserController.php";

    session_status_check();
    $url_limpia = obtenerUrlLimpia();

    if (isset($_SESSION['email'])) {
        echo "<h1>Casas en venta</h1>";
        echo "<h5 style='text-align: center; color: rgb(245, 222, 179);'>Bienvenido(a), " . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . "!</h5>";

        $vendedorController = new VendedorController();
        $terrenoController = new TerrenoController();
        $usuarioController = new UserController();

        $result_terreno = $terrenoController->listar_terrenos();
        if (!is_string($result_terreno)) {
            foreach ($result_terreno as $terreno) {
                $result_vendedor = $vendedorController->listar_vendedor($terreno->getIdVendedor());
                $result_usuario = $usuarioController->listar_usuario($result_vendedor->getIdUsuario());
                if ($result_usuario->getId() != $_SESSION['id']) {
                    if ($result_vendedor !== null && $result_usuario) {
                        echo
                            '
                    <div class="container">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"> Vendedor: ' . $result_usuario->getNombre() . ' ' . $result_usuario->getApellido() . ' Cuenta: ' . $result_vendedor->getNumeroCuenta() . '</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary"> Localización: ' . $terreno->getLocalizacion() . '</h6>
                                <p class="card-text"> Descripción: ' . $terreno->getDescripcion() . '</p>
                                <a href="' . $url_limpia . '/comprarCasa.php?casa=' . $terreno->getId() . '" class="card-link btn btn-success">Comprar Casa</a>
                            </div>
                        </div> 
                    </div>
                    <br>
            ';
                    }
                }
            }
        } else {
            // El objeto $result_vendedor o $result_usuario es nulo, hacer algo aquí
            echo '
            <div class="container alert alert-danger">
                <p>No se han encontrado casas en venta, puedes vender la tuya <a class="link" href="' . $url_limpia . '/venderCasas.php">aquí</a></p>
            </div>
            ';
        }

    } else {
        echo "No estás logeado.";
    }
    ?>

</body>

</html>