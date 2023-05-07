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
    include "controllers/TerrenoController.php";
    include "controllers/VendedorController.php";
    // obtenida de funciones.php
    
    session_status_check();

    if (isset($_POST['enviar'])) {
        $vendedorController = new VendedorController();
        $terrenoController = new TerrenoController();

        // Obtener el vendedor correspondiente al ID de sesión del usuario
        $vendedor = $vendedorController->listar_vendedor_usuario($_SESSION['id']);
        echo $vendedor;
        // Si no existe el vendedor, crear uno nuevo con el ID de sesión del usuario
        if ($vendedor === null) {
            $vendedor = new Vendedor($_SESSION['id'], $_POST['numeroCuenta']);
            
            echo "es nulo: ".$vendedor;
        }
        // Si ya existe el vendedor, actualizar el numero de cuenta
        else {

            $vendedor->setNumeroCuenta($_POST['numeroCuenta']);
            //echo "no es nulo: ".$vendedor;
        }

        $result_vendedor = $vendedorController->guardar($vendedor);
        if($result_vendedor == true){
            $vendedorGuardado = $vendedorController->listar_ultimo_vendedor_id_usuario($_SESSION['id']);
            $vendedor->setId($vendedorGuardado->getId());
        }

        // Ahora el objeto $vendedor tiene el ID actualizado si fue un vendedor existente, o el ID recién creado si era nuevo.
        $terreno = new Terreno($vendedor->getId(), $_POST['localizacion'], $_POST['descripcion'], $_POST['precio']);

        $result_terreno = $terrenoController->guardar($terreno);
        if ($result_vendedor === true && $result_terreno === true) {
            echo '<div class="container alert alert-success">Casa en venta con exito! </div>';
        } else {
            echo '<div class=" container alert alert-danger">La casa no se ha podido vender! ' . $result_vendedor . ' </div>';
        }
    }


    ?>
    <h1>Datos Casa</h1>
    <div class="container">
        <form action="venderCasas.php" method="post">
            <?php
            if (isset($_SESSION['id'])) {
                // si existe la sesion se ejecuta la funcion
                $form = datos_recogidos();

            } else {
                $form =
                    '
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" value="Usuario" required disabled>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input type="text" class="form-control" id="apellido" value="Invitado" required disabled>
                    </div>
                    <div class="mb-3">
                    <label for="apellido" class="form-label">Vendedor?:</label>
                    <input type="text" class="form-control" id="apellido" value="NO" required disabled>
                </div>
                ';
            }
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
                <?php
                if (isset($_SESSION['id'])) {
                    echo '<input class="btn btn-primary" type="submit" value="Enviar" name="enviar">';
                    echo '<a class="btn btn-danger" href="' . $url_limpia . '/index.php">Cancelar</a>';
                } else {
                    echo '<a class="btn btn-info" href="' . $url_limpia . '/login.php">debes iniciar sesion primero</a>';

                }
                //echo '<a class="btn btn-danger" href="' . $url_limpia . '/index.php">Cancelar</a>';
                ?>
            </div>
        </form>

    </div>

</body>

</html>