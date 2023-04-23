<?php 
    class Comprador{
        private $id;
        private $id_usuario;
        private $metodo_pago;
        private $cuenta;
        private $cvv;

        public function __construct($id_usuario, $metodo_pago, $cuenta, $cvv){
            $this->id_usuario = $id_usuario;
            $this->metodo_pago = $metodo_pago;
            $this->cuenta = $cuenta;
            $this->cvv = $cvv;
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
        public function getMetodoPago(){
            return $this->metodo_pago;
        }

        public function setMetodoPago($metodo_pago){
            $this->metodo_pago = $metodo_pago;
        }
        public function getCuenta(){
            return $this->cuenta;
        }

        public function setCuenta($cuenta){
            $this->cuenta = $cuenta;
        }
        
        public function getCvv(){
            return $this->cvv;
        }

        public function setCvv($cvv){
            $this->cvv = $cvv;
        }

        public function __toString(){
            return "ID: ". $this->id." id_usuario: ".$this->id_usuario." Metodo Pago: ".$this->metodo_pago;
        }
    }
?>