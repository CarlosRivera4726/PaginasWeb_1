<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicio</title>
</head>
<body>
    <?php 
        include "static/navBar.php";

        // funcion get
        session_status_check();
        
        if(isset($_SESSION['email'])){
            echo "Bienvenido(a), " . $_SESSION['nombre'] . " " . $_SESSION['apellido'] . "!";
        }else{
            echo "No estás logeado.";
        }

		$url_actual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		echo $url_actual;
    ?>
</body>
</html>