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
        include "database/connection.php";
        include "static/navBar.php";

        if(isset($_POST['validacion'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $connection = new connection();
            $query = "SELECT * FROM USUARIOS WHERE EMAIL=:email";
            $stmt = $connection->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(count($user)>0 && password_verify($password, $user[0]['CLAVE'])){
                // autenticacion exitosa
                if(session_status() == PHP_SESSION_NONE){ session_start(); }
                $_SESSION['nombre'] = $user[0]['NOMBRE'];
                $_SESSION['apellido'] = $user[0]['APELLIDO'];
                $_SESSION['email'] = $user[0]['EMAIL'];
                $_SESSION['genero'] = $user[0]['GENERO'];
                $url_limpia = obtenerUrlLimpia();
                header("Location: ".$url_limpia."/casas.php");
            }

        }else{
            echo '
            <div class="container">
                <form action="login.php" method="post">
                    <div class="mb-3">
                        <label class="form-label" for="email">Correo Electrónico:</label>
                        <input class="form-control" type="email" name="email" placeholder="email@mail.com" required><br>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Contraseña:</label>
                        <input class="form-control" type="password" name="password" required><br>
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