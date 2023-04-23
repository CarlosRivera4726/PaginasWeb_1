<?php 

    class Compra{
        private $id;
        private $id_comprador;
        private $id_terreno;
        private $fecha_compra;

        public function __construct($id_comprador, $id_terreno, $fecha_compra){
            $this->id_comprador = $id_comprador;
            $this->id_terreno = $id_terreno;
            $this->fecha_compra = $fecha_compra;
        }

        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }
        public function getIdComprador(){
            return $this->id_comprador;
        }

        public function setIdComprador($id_comprador){
            $this->id_comprador = $id_comprador;
        }
        
        public function getIdTerreno(){
            return $this->id_terreno;
        }

        public function setIdTerreno($id_terreno){
            $this->id_terreno = $id_terreno;
        }

        public function getFechaCompra(){
            return $this->fecha_compra;
        }

        public function __toString(){
            return "Id: ".$this->id." Comprador: ".$this->id_comprador." Terreno: ".$this->id_terreno." Fecha: ".$this->fecha_compra;
        }
    }
?>