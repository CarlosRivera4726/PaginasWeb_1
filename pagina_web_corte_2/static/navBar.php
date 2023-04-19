<?php 
  include "estilos.html";
  include "funciones.php";
  
  $url_limpia = obtenerUrlLimpia();

  $navBar = '
  	<header>
  
	  <div class="container-nav">
		
		<nav>
			<ul style="display: flex; align-items: center;">
				<li><img class="welcome" src="imgs/casasLogo2.png"/> </li>

				<form action="index.php" method="get">
					<li style="text-align: center;">
						<input type="text" placeholder="Buscar...">
						<button type="submit">Buscar</button>
					</li>
				</form>
				<div class="container-li">
					<li><a href="'.$url_limpia.'/index.php"><i class="icon-home"></i> Inicio</a></li>
					<li><a href="'.$url_limpia.'/comprarCasas.php"><i class="icon-price"></i> Comprar Casas</a></li>
					<li><a href="'.$url_limpia.'/VenderCasas.php"><i class="icon-sold"></i> Vender Casas</a></li>
				';

  // Si el usuario ha iniciado sesión, muestra "Cerrar sesión" en lugar de "Ingresar" y "Registrarse"
  if (session_status() == PHP_SESSION_NONE) { session_start(); }

  if(isset($_SESSION['email'])){
      $navBar .= '<li><a href="'.$url_limpia.'/logout.php"><i class="icon-logout"></i> Cerrar sesión</a></li>';
  }else{
      $navBar .= '<li><a href="'.$url_limpia.'/register.php"><i class="icon-register"></i> Registrarse</a></li>
				<li><a href="'.$url_limpia.'/login.php"><i class="icon-user"></i> Ingresar</a></li>';
  }

  $navBar .= '
  		</div>
		</nav>
	
	  </div>
	  
	</header>
  ';
  
  echo $navBar;
?>
