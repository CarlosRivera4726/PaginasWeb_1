<?php 
    class Terreno{
        private $id;
        private $id_vendedor;
        private $localizacion;
        private $descripcion;
        private $precio;

        public function __construct($id_vendedor, $localizacion, $descripcion, $precio){
            $this->id_vendedor = $id_vendedor;
            $this->localizacion = $localizacion;
            $this->descripcion = $descripcion;
            $this->precio = $precio;
        }


        // getters and setters
        // getter and setter column id
        public function getId(){
            return $this->id;
        }
        
        public function setId($id){
            $this->id = $id;
        }

        // getter and setter column IdVendedor
        public function getIdVendedor(){
            return $this->id_vendedor;
        }
        
        public function setIdVendedor($id_vendedor){
            $this->id_vendedor = $id_vendedor;
        }

        // getter and setter column localizacion
        public function getLocalizacion(){
            return $this->localizacion;
        }
        
        public function setLocalizacion($localizacion){
            $this->localizacion = $localizacion;
        }

        // getter and setter column Descripcion
        public function getDescripcion(){
            return $this->descripcion;
        }
        
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        // getter and setter column Precio
        public function getPrecio(){
            return $this->precio;
        }
        
        public function setPrecio($precio){
            $this->precio = $precio;
        }

        public function __toString(){
            return "ID: ".$this->id." Vendedor: ".$this->id_vendedor." Descripcion: ".$this->descripcion. " Precio: ".$this->precio;
        }
    }
?>