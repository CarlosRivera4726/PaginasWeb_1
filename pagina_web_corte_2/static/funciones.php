<?php
function obtenerUrlLimpia()
{
    $url_actual = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $delimitador = 'pagina_web_corte_2/';
    $posicion = strpos($url_actual, $delimitador);
    $url_limpia = substr($url_actual, 0, $posicion + strlen($delimitador) - 1);
    return $url_limpia;
}
function session_status_check()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function datos_recogidos()
{
    $form =
        '
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" value="' . $_SESSION['nombre'] . '" required disabled>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" value="' . $_SESSION['apellido'] . '" required disabled>
            </div>
            <div class="mb-3">
            <label for="apellido" class="form-label">Vendedor?:</label>
            <input type="text" class="form-control" id="apellido" value="' . (($_SESSION['es_vendedor'] == 1) ? "Sí" : "No") . '" required disabled>
            </div>
        ';
    return $form;
}
function form_login()
{
    $form = '
    <div class="container">
        <form action="login.php" method="post">
            <div class="mb-3">
                <label class="form-label" for="email">Correo Electrónico:</label>
                <input class="form-control" type="email" name="email" placeholder="email@mail.com" required><br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Contraseña:</label>
                <input class="form-control" type="password" name="password" placeholder="*********" required><br>
            </div>
            <div class="form-group mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar" name="validacion">
            </div>
        </form>
    </div>
';
    return $form;
}
?>