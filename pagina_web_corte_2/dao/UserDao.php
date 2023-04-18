<?php 
    include 'models/UserModel.php';

    class UserDao{
    
        private $connection;
        

        public function __construct($connection){ $this->connection = $connection; }

        public function guardar($usuario = User) {

            $query = "INSERT INTO USUARIOS (NOMBRE, APELLIDO, EMAIL, GENERO, CLAVE) VALUES (:nombre, :apellido, :email, :genero, :clave)";
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(':nombre', $usuario->getNombre());
            $stmt->bindParam(':apellido', $usuario->getApellido());
            $stmt->bindParam(':email', $usuario->getEmail());
            $stmt->bindParam(':genero', $usuario->getGenero());
            $stmt->bindParam(':clave', $usuario->getPassword());
            $result = $stmt->execute();

            if($result){
                return "Guardado correctamente";
            }else{
                return "No se ha podido guardar";
            }
        }


        public function login($id, $password){
            $query = "SELECT ID, NOMBRE, APELLIDO, EMAIL, GENERO FROM USUARIOS WHERE ID=:ID";
        }
    }

?>