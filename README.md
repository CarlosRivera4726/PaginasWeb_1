
# Página Web - venta de casas 📝  
Es una web sencilla para entrega en la universidad, la idea es entregar a los usuarios casas con un valor y otros datos.

## Get Started 🚀  
Al momento de este commit se tiene el registro en la base de datos de los usuarios, así que más abajo les dejo la creacion de la tabla y la base de datos

### MYSQL 💼
~~~SQL  
    CREATE SCHEMA IF NOT EXISTS venta_casas;
    DROP TABLE IF EXISTS USUARIOS;
    CREATE TABLE IF NOT EXISTS USUARIOS(
        ID INT AUTO_INCREMENT PRIMARY KEY,
        NOMBRE VARCHAR(25) NOT NULL,
        APELLIDO VARCHAR(25) NOT NULL,
        EMAIL VARCHAR(55) NOT NULL UNIQUE,
        GENERO VARCHAR(25) NOT NULL,
        CLAVE VARCHAR(2000) NOT NULL
    );

    INSERT INTO USUARIOS(NOMBRE, APELLIDO, EMAIL, GENERO, CLAVE) VALUES("usuario", "prueba", "mail.prueba@mail.COM", "masculino", "$2y$10$R4IJRK8ceXDV8xiZsa0gTeOr4TWfPDFlBsuL3mC/yKKQLqpphIgMa");


    SELECT * FROM USUARIOS;
~~~ 
### PHP 🐘
~~~
    <?php
	class User {
		private $nombre;
		private $apellido;
		private $genero;
		private $password;
		private $email;
		
		public function __construct($nombre, $apellido, $email, $password, $genero,) {
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->email = $email;
			$this->password = $password;
			$this->genero = $genero;
		}
		
		public function getNombre(){
			return $this->nombre;
		}
		
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		
		public function getApellido(){
			return $this->apellido;
		}
		
		public function setApellido($apellido){
			$this->apellido = $apellido;
		}
		
		public function getGenero(){
			return $this->genero;
		}
		
		public function setGenero($genero){
			$this->genero = $genero;
		}
		
		public function getPassword(){
			return $this->password;
		}
		
		public function setPassword($password){
			$this->password = $password;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setEmail($email){
			$this->email = $email;
		}

		public function toString(){
			return $this->nombre . " " . $this->apellido;
		}
	}

?>
~~~

#### Resto de la Logica
El resto de la lógica se puede ver dentro del proyecto, lo importante como el sql está en esta parte puesto que es lo unico que no se sube en github
a menos que se exporte la base de datos