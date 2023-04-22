<?php 
    require_once "static/funciones.php";
    session_status_check();
    
    session_destroy();
    header("Location: login.php");
?>