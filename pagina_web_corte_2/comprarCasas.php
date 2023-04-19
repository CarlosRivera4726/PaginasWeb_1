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
        if(session_status() == PHP_SESSION_NONE) { session_start(); }
        include "database/connection.php";
        include "static/navBar.php";
        if(isset($_SESSION['email'])){
            echo "Bienvenido(a), " . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . "!";
        }else{
            echo "No estás logeado.";
        }
    ?>

</body>
</html>