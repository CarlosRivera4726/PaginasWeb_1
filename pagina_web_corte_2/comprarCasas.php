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
        
        session_status_check();
        
        if(isset($_SESSION['email'])){
            echo "Bienvenido(a), " . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . "!";
        }else{
            echo "No estás logeado.";
        }
    ?>

</body>
</html>