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


        public function login($email){
            try{
                $query = "SELECT * FROM ".$this->table." WHERE EMAIL=:email";
                $stmt = $this->connection->prepare($query);
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                /*
                    $user[0]['APELLIDO'];
                    $_SESSION['email'] = $user[0]['EMAIL'];
                    $_SESSION['genero'] = $user[0]['GENERO'];
                */
                $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if(count($resultSet) > 0){
                    $usuario = new User($resultSet[0]['nombre'],
                                        $resultSet[0]['apellido'],
                                        $resultSet[0]['email'],
                                        $resultSet[0]['clave'],
                                        $resultSet[0]['genero']
                                    );

                    $usuario->setId($resultSet[0]['id']);
                    $usuario->setEsVendedor($resultSet[0]['es_vendedor']);

                    return $usuario;
                } else{
                    return null;
                }
            }catch(Exception $ex){
                    return "El correo no se encuentra registrado!";
            }
        }
    }

?>