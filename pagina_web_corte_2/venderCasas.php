<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vender Casas</title>
</head>

<body>
    <?php

    require_once "static/navBar.php";
    include "controllers/VendedorController.php";
    // obtenida de funciones.php
    
    session_status_check();

    if (isset($_POST['enviar'])) {
        $vendedor = new Vendedor($_SESSION['id'], $_POST['numeroCuenta']);
        $vendedorController = new VendedorController();
        $result = $vendedorController->guardar($vendedor);
        if ($result === true) {
            echo '<div class="alert alert-success">Casa en venta con exito! </div>';
        } else {
            echo '<div class="alert alert-danger">La casa no se ha podido vender! ' . $result . ' </div>';
        }
    }
    echo $_SESSION['id'];
    ?>
    <h1>Datos Casa</h1>
    <div class="container">
        <form action="venderCasas.php" method="post">
            <?php
            $form =
                '
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" value="' . $_SESSION['nombre'] . '" required disabled>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" value="' . $_SESSION['apellido'] . '" required disabled>
                    </div>
                    <div class="mb-3">
                    <label for="apellido" class="form-label">Vendedor?:</label>
                    <input type="text" class="form-control" id="apellido" value="' . (($_SESSION['es_vendedor'] == 1) ? "Sí" : "No") . '" required disabled>
                </div>
                ';
            echo $form;
            ?>
            <div class="mb-3">
                <label for="numeroCuenta" class="form-label">Número Cuenta:</label>
                <input type="number" class="form-control" id="numeroCuenta" name="numeroCuenta" placeholder="1234567890"
                    required>
            </div>

            <div class="mb-3">
                <label for="localizacion" class="form-label">Localización:</label>
                <input type="text" class="form-control" id="localizacion" name="localizacion"
                    placeholder="Barrio la esmeralda" required>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" placeholder="$ 2'000.000" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                    placeholder="Hermosa casa en el barrio de la esmeralda...4 piesas"></textarea>
            </div>

            <div class="form-group mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar" name="enviar">
                <?php
                echo '<a class="btn btn-danger" href="' . $url_limpia . '/index.php">Cancelar</a>';
                ?>
            </div>
        </form>

    </div>

</body>

</html>