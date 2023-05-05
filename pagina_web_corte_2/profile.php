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

    echo "<h1>Perfil</h1>";

    session_status_check();
    $url_limpia = obtenerUrlLimpia();
    $no_vende = 0;
    if (isset($_SESSION['id'])) {
        $form = datos_recogidos();
    }
    echo '<div class="container">' . $form . '</div>';

    if (isset($_SESSION['email'])) {
        echo "<hr>";
        echo '<h3 style="text-align:center;">Casas En Venta</h3>';
        echo "<hr>";
        $vendedorController = new VendedorController();
        $terrenoController = new TerrenoController();
        $usuarioController = new UserController();

        $result_terreno = $terrenoController->listar_terrenos();
        if (!is_string($result_terreno)) {
            foreach ($result_terreno as $terreno) {
                $result_vendedor = $vendedorController->listar_vendedor($terreno->getIdVendedor());
                $result_usuario = $usuarioController->listar_usuario($result_vendedor->getIdUsuario());
                if ($result_usuario->getId() == $_SESSION['id']) {
                    if ($result_vendedor !== null && $result_usuario) {
                        echo
                            '
                                <div class="container">
                                    <div class="card" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title"> Vendedor: ' . $result_usuario->getNombre() . ' ' . $result_usuario->getApellido() . ' Cuenta: ' . $result_vendedor->getNumeroCuenta() . '</h5>
                                            <h6 class="card-subtitle mb-2 text-body-secondary"> Localización: ' . $terreno->getLocalizacion() . '</h6>
                                            <p class="card-text"> Descripción: ' . $terreno->getDescripcion() . '</p>
                                        </div>
                                    </div> 
                                </div>
                                <br>
                            ';
                    }
                    
                    $no_vende += 1;
                }
            }
        }
        if ($no_vende === 0) {
            echo '
            <div class="container alert alert-danger">
                <p>No has vendido casas en este momento, puedes vender la tuya <a class="link" href="http://localhost/PaginasWeb_1/pagina_web_corte_2/venderCasas.php">aquí</a></p>
            </div>
        ';
        }

    } else {
        echo "No estás logeado.";
    }
    ?>

</body>

</html>