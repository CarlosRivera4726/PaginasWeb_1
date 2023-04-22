<?php
echo '
	<!DOCTYPE html>
	<html lang="es">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	';


	include 'static/navBar.php';
	include 'controllers/UserController.php';

	echo '	<title>Registro Usuarios</title>
		</head>
	<body>';
	$mostrar_error = false;
	
	
	$url_limpia = obtenerUrlLimpia();
	$message = "";
	
	
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
			
			if($result === true){
				header("Location: ".$url_limpia."/login.php");
			} else {
				$mostrar_error = true;
				$message = "Error al registrar el usuario: Correo electronico en uso";
			}
		} else {
			$mostrar_error = true;
			$message = "Las contraseñas no coinciden. Por favor inténtelo de nuevo.";
		}
	}
		
	$form = '<div class="container-sm">	
				<div class="error-message alert alert-danger '.($mostrar_error ? 'd-block' : 'd-none').' ">
					'.$message.'
				</div>
			 </div>
			<h1 class="h1 text-center" >Formulario de Registro</h1>
			<div class="container">
			<form action="register.php" method="post">
			
				<div class="mb-3">
					<label class="form-label" for="nombre">Nombre:</label>
					<input class="form-control" type="text" name="nombre" value="'. (isset($_POST['nombre']) ? $_POST['nombre'] : "") .'" placeholder="Juanito" required><br>
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="apellido">Apellido:</label>
					<input class="form-control" type="text" name="apellido" value= "'. (isset($_POST['apellido']) ? $_POST['apellido'] : "") .'" placeholder="Perez" required><br>
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="email">Correo Electrónico:</label>
					<input class="form-control" type="email" name="email" value= "'. (isset($_POST['email']) ? $_POST['email'] : "") .'" placeholder="email@mail.com" required><br>
				</div>
	
				<div class="mb-3">
					<label class="form-label" for="password">Contraseña:</label>
					<input class="form-control" type="password" name="password" required><br>
				</div>
	
				<div class="mb-3">
					<label class="form-label" for="confirmPassword">Repita Contraseña:</label>
					<input class="form-control" type="password" name="confirmPassword" required><br>
				</div>
				
				<div class="mb-4 form-separator">
					<label class="form-label" for="genero">Género:</label>
					<div class="form-control">
						<input class="form-check-input" type="radio" name="genero" value="masculino" checked> Masculino
						<input class="form-check-input" type="radio" name="genero" value="femenino"> Femenino
						<input class="form-check-input" type="radio" name="genero" value="otro"> Otro
					</div>
				</div>
	
				<div class="form-group mb-3">
					<input class="btn btn-primary" type="submit" value="Enviar" name="validacion">
					<a class="btn btn-danger" href="'.$url_limpia.'/index.php">Cancelar</a>
					
				</div>
				
	
			</form>
			</div>
			';
    	echo $form;


?>
</body>
</html>

