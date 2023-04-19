<?php 
    include 'models/UserModel.php';

    class UserDao{
    
        private $connection;
        private $table = "USUARIO";
        

        public function __construct($connection){ $this->connection = $connection; }

        public function guardar($usuario = User) {

            $query = "INSERT INTO ".$table." (NOMBRE, APELLIDO, EMAIL, GENERO, CLAVE, ES_VENDEDOR) VALUES (:nombre, :apellido, :email, :genero, :clave)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':nombre', $usuario->getNombre());
            $stmt->bindParam(':apellido', $usuario->getApellido());
            $stmt->bindParam(':email', $usuario->getEmail());
            $stmt->bindParam(':genero', $usuario->getGenero());
            $stmt->bindParam(':clave', $usuario->getPassword());
            $result = $stmt->execute();

            if($result){
                return "Te has registrado con exito!";
            }else{
                return "No te has podido registrar correctamente!";
            }
        }


        public function login($id, $password){
            $query = "SELECT ID, NOMBRE, APELLIDO, EMAIL, GENERO FROM USUARIOS WHERE ID=:ID";
        }
    }

?>