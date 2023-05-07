<?php
include_once "static/navBar.php";
    echo '<h1>Pago</h1>';
    if(isset($_GET['casa'])){
        $form = datos_recogidos();
        echo '<div class="container">
                <form action="'.$url_limpia.'/comprarCasa.php" method="post">';
        
        $form.='
            
            <div class="mb-3">
                <label for="metodo" class="form-label">Seleccione:</label>
                <select id="metodo" class="form-select" aria-label="Default select example">
                    <option selected>Método de Pago</option>
                    <option value="1">Tarjeta de Crédito</option>
                    <option value="2">Tarjeta de Débito</option>
                    <option value="3">Físico</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="cuenta" class="form-label">Cuenta:</label>
                <input type="numeric" class="form-control" id="cuenta" placeholder="1223456" required>
            </div>
            <div class="mb-3">
                <label for="cvv" class="form-label">Cvv:</label>
                <input type="password" class="form-control" id="cvv" placeholder="***" name="cvv" pattern="[0-9.-]{8,12}" title="formato incorrecto" required>
            </div>
            <div class="mb-2">
                <button class="btn btn-success" type="submit">Comprar</button>
                <a class="btn btn-danger" href="'.$url_limpia.'/casasVenta.php">Volver</a>
            </div>
        ';
        echo $form;
        echo '</form>
        </div>';
    }else{
        header("location: ".$url_limpia."/index.php");
    }

?>