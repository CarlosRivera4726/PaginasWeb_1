<?php 
  include "estilos.html";
  
  $url_actual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  $delimitador = 'pagina_web_corte_2/';
  $posicion = strpos($url_actual, $delimitador);
  $url_limpia = substr($url_actual, 0, $posicion + strlen($delimitador) - 1);
  
  $status = "Invitado";

  $navBar = '
  	<header>
  
	  <div class="container-nav">
		
		<nav>
			<ul>
			   <li><img class="welcome" src="imgs/CarlosPC.png"/> </li>
			   <li><a href="'.$url_limpia.'/index.php"><i class="icon-home"></i> Inicio</a></li>
			   <li><a href="'.$url_limpia.'/casas.php"><i class="icon-price"></i> Comprar Casas</a></li>
			   <li><a href="'.$url_limpia.'/register.php"><i class="icon-register"></i> Registrarse</a></li>
			   <li><a href="'.$url_limpia.'/login.php"><i class="icon-user"></i> Ingresar</a></li>
			</ul>
		</nav>
	
	  </div>
	  
	</header>
  ';
  
  echo $navBar;
?>
