<?php 
    class Vendedor{
        private $id;
        private $id_usuario;
        private $numero_cuenta;

        public function __construct($id_usuario, $numero_cuenta){
            $this->id_usuario = $id_usuario;
            $this->numero_cuenta = $numero_cuenta;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }
        public function getIdUsuario(){
            return $this->id_usuario;
        }

        public function setIdUsuario($id_usuario){
            $this->id_usuario = $id_usuario;
        }
        public function getNumeroCuenta(){
            return $this->numero_cuenta;
        }

        public function setNumeroCuenta($numero_cuenta){
            $this->numero_cuenta = $numero_cuenta;
        }
        

        public function __toString(){
            return "ID: ". $this->id." id_usuario: ".$this->id_usuario." Número Cuenta: ".$this->numero_cuenta;
        }
    }
?>