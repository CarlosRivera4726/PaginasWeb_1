<?php
include 'models/VendedorModel.php';
include 'controllers/UserController.php';

class VendedorDao
{

    private $connection;
    private $table = "VENDEDOR";


    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function guardar($vendedor = Vendedor)
    {
        try {
            $query = "INSERT INTO " . $this->table . " (ID_USUARIO, NUMERO_CUENTA) VALUES (:id_usuario, :numero_cuenta)";
            $stmt = $this->connection->prepare($query);

            $id_usuario = $vendedor->getIdUsuario();
            $stmt->bindParam(':id_usuario', $id_usuario);

            $numeroCuenta = $vendedor->getNumeroCuenta();
            $stmt->bindParam(':numero_cuenta', $numeroCuenta);
            if($_SESSION['es_vendedor'] == 1 && $stmt->execute() && $stmt->rowCount() > 0){
                return true;
            }else{
                $stmt->execute();
                $usuarioController = new UserController();
                $result = $usuarioController->actualizarEstado($vendedor->getIdUsuario());
                if($result === true){
                    return true;
                }else{
                    return $result;
                }
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}

?>