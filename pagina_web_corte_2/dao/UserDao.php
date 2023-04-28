<?php
include 'models/UserModel.php';

class UserDao
{

    private $connection;
    private $table = "USUARIO";


    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function guardar($usuario)
    {
        try {
            $query = "INSERT INTO " . $this->table . " (NOMBRE, APELLIDO, EMAIL, GENERO, CLAVE) VALUES (:nombre, :apellido, :email, :genero, :clave)";
            $stmt = $this->connection->prepare($query);

            $nombre = $usuario->getNombre();
            $stmt->bindParam(':nombre', $nombre);

            $apellido = $usuario->getApellido();
            $stmt->bindParam(':apellido', $apellido);

            $email = $usuario->getEmail();
            $stmt->bindParam(':email', $email);

            $genero = $usuario->getGenero();
            $stmt->bindParam(':genero', $genero);

            $clave = $usuario->getPassword();
            $stmt->bindParam(':clave', $clave);

            $stmt->execute();
            return true;
        } catch (PDOException $ex) {
            return $ex->getMessage();
        } finally {
            $this->closeConnection();
        }
    }

    public function login($email)
    {
        try {
            $query = "SELECT * FROM " . $this->table . " WHERE EMAIL=:email";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($resultSet) > 0) {
                $usuario = new User(
                    $resultSet[0]['NOMBRE'],
                    $resultSet[0]['APELLIDO'],
                    $resultSet[0]['EMAIL'],
                    $resultSet[0]['CLAVE'],
                    $resultSet[0]['GENERO']
                );

                $usuario->setId($resultSet[0]['ID']);
                $usuario->setEsVendedor($resultSet[0]['ES_VENDEDOR']);

                return $usuario;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            return "El correo no se encuentra registrado!";
        } finally {
            $this->closeConnection();
        }
    }
    /*      UPDATE `venta_casas`.`USUARIO` SET `ES_VENDEDOR` = '1' WHERE (`ID` = '3'); */
    public function actualizarEstado($id)
    {
        try {
            $query = "UPDATE " . $this->table . " SET ES_VENDEDOR = 1 WHERE id=:id";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute() !== false && $stmt->rowCount() > 0) {
                
                $_SESSION['es_vendedor']=1;
                return true;
            } else {
                return "El usuario no se actualizo con exito";
            }
        } catch (Exception $ex) {
            return "El usuario no se encuentra registrado!";
        } finally {
            $this->closeConnection();
        }
    }
    private function closeConnection()
    {
        $this->connection = null;
    }
}

?>