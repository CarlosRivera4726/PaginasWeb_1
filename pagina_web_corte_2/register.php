<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registro Usuarios</title>
</head>
<body>
<?php 

	include 'static/navBar.php';
	include 'controllers/UserController.php';

	$url_limpia = obtenerUrlLimpia();

	if(isset($_POST['validacion'])){

		$password = $_POST['password'];
		$password2 = $_POST['confirmPassword'];

		if($password == $password2){

			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$email = $_POST['email'];
			$genero = $_POST['genero'];
			$pass = password_hash($password, PASSWORD_BCRYPT);
			$usuario = new User($nombre, $apellido, $email, $pass, $genero);
			$userController = new UserController();
			$result = $userController->guardar($usuario);

			header("Location: ".$url_limpia."/login.php");
		} else {
			header("Location: ".$url_limpia."/register.php");
		}
		
	}
	else {
		echo '<h1 class="h1 text-center" >Formulario de Registro</h1>
				<div class="container">
					<form action="register.php" method="post">
					
						<div class="mb-3>
							<label class="form-label" for="nombre">Nombre:</label>
							<input class="form-control" type="text" name="nombre" required><br>
						</div>
						
						<div class="mb-3>
							<label class="form-label" for="apellido">Apellido:</label>
							<input class="form-control" type="text" name="apellido" required><br>
						</div>
						
						<div class="mb-3>
							<label class="form-label" for="email">Correo Electrónico:</label>
							<input class="form-control" type="email" name="email" required><br>
						</div>

						<div class="mb-3>
							<label class="form-label" for="password">Contraseña:</label>
							<input class="form-control" type="password" name="password" required><br>
						</div>

						<div class="mb-3>
							<label class="form-label" for="confirmPassword">Repita Contraseña:</label>
							<input class="form-control" type="password" name="confirmPassword" required><br>
						</div>
						
						<div class="mb-4 form-separator>
							<label class="form-label" for="genero">Género:</label>
							<div class="form-control">
								<input class="form-check-input" type="radio" name="genero" value="masculino" checked> Masculino
								<input class="form-check-input" type="radio" name="genero" value="femenino"> Femenino<br>
							</div>
						</div>
						
						<div class="form-group mb-3">
							<input class="btn btn-primary" type="submit" value="Enviar" name="validacion">
							
							<a class="btn btn-danger" href="'.$url_limpia.'/index.php">Cancelar</a>
						</div>
					</form>
					</div>
		';
	}
	?>
</body>
</html>


