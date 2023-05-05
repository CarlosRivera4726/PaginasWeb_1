<?php
include_once "estilos.html";
require_once "funciones.php";

$url_limpia = obtenerUrlLimpia();

$navBar = '
  	<header>
  
	  <div class="barra-navegacion">
		<div class="imagen">
			<img class="welcome" src="imgs/casasLogo2.png"/> 
		</div>

			<form class="contenedor_buscar" action="" method="get">
				<input class="input-barraBuscar" type="text" name="buscar" placeholder="Buscar..." />
				<button class="boton-barraBuscar" type="submit">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</form>
			
			<div class="container-li">
				<li><a href="' . $url_limpia . '/index.php"><i class="icon-home"></i> Inicio</a></li>
				<li><a href="' . $url_limpia . '/casasVenta.php"><i class="icon-price"></i> Comprar Casas</a></li>
				<li><a href="' . $url_limpia . '/venderCasas.php"><i class="icon-sold"></i> Vender Casas</a></li>
				';

// Si el usuario ha iniciado sesión, muestra "Cerrar sesión" en lugar de "Ingresar" y "Registrarse"
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_SESSION['es_vendedor']) == 1){
	$navBar .= '<li><a href="' . $url_limpia . '/profile.php"><i class="icon-user"></i>Perfil</a></li>';
}
if (isset($_SESSION['email'])) {
	$navBar .= '<li><a href="' . $url_limpia . '/logout.php"><i class="icon-logout"></i> Cerrar sesión</a></li>';
} else {
	$navBar .= '<li><a href="' . $url_limpia . '/register.php"><i class="icon-register"></i> Registrarse</a></li>
				<li><a href="' . $url_limpia . '/login.php"><i class="icon-user"></i> Ingresar</a></li>';
}

$navBar .= '
  		</div>
	
	  </div>
	  
	</header>
  ';

echo $navBar;
?>