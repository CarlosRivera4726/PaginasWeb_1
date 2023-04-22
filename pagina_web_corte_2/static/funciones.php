<?php 
    function obtenerUrlLimpia() {
        $url_actual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $delimitador = 'pagina_web_corte_2/';
        $posicion = strpos($url_actual, $delimitador);
        $url_limpia = substr($url_actual, 0, $posicion + strlen($delimitador) - 1);
        return $url_limpia;
    }
    function session_status_check(){ if(session_status() == PHP_SESSION_NONE) {  session_start(); } }
?>