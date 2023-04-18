<?php
	class User {
		
		private $id;
		private $nombre;
		private $apellido;
		private $genero;
		private $password;
		private $email;
		
		public function __construct($nombre, $apellido, $email, $password, $genero) {
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->email = $email;
			$this->password = $password;
			$this->genero = $genero;
		}

		public function getId(){ return $this->id; }

		public function setId($id){ $this->id = $id; }
		
		public function getNombre() { return $this->nombre; }
		
		public function setNombre($nombre) { $this->nombre = $nombre; }
		
		public function getApellido() { return $this->apellido; }
		
		public function setApellido($apellido) { $this->apellido = $apellido; }
		
		public function getGenero() { return $this->genero; }
		
		public function setGenero($genero) { $this->genero = $genero; }
		
		public function getPassword() { return $this->password; }
		
		public function setPassword($password) { $this->password = $password; }
		
		public function getEmail() { return $this->email; }
		
		public function setEmail($email) { $this->email = $email; }

		public function toString() { return $this->nombre . " " . $this->apellido; }
	}

?>
