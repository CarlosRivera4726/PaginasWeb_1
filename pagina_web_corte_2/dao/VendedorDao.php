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
            if ($_SESSION['es_vendedor'] == 1 && $stmt->execute() && $stmt->rowCount() > 0) {
                return true;
            } else {
                $stmt->execute();
                $usuarioController = new UserController();
                $result = $usuarioController->actualizarEstado($vendedor->getIdUsuario());
                if ($result === true) {
                    return true;
                } else {
                    return $result;
                }
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }

    public function listar_vendedor($id)
    {
        try {
            $query = "SELECT * FROM " . $this->table . " WHERE ID = :id";

            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($resultSet) > 0) {
                $vendedor = new Vendedor(
                    $resultSet[0]['ID_USUARIO'],
                    $resultSet[0]['NUMERO_CUENTA']
                );
                $vendedor->setId($resultSet[0]['ID']);
                return $vendedor;
            } else {
                return null;
            }
        } catch (PDOException $ex) {
            echo "Error al ejecutar la consulta: " . $ex->getMessage();
            return null;
        }
    }
}

?>