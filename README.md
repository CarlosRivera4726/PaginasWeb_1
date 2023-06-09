
# Página Web - venta de casas 📝  
Es una web sencilla para entrega en la universidad, la idea es entregar a los usuarios casas con un valor y otros datos.

## Get Started 🚀  
Al momento de este commit se tiene el registro en la base de datos de los usuarios, así que más abajo les dejo la creacion de la tabla y la base de datos

### MYSQL 💼
###### Modelo!
![Modelo_Pagina_web](https://user-images.githubusercontent.com/49885608/235392452-6a10bc79-50be-47e8-82af-258e16f84279.png)

~~~SQL  
DROP SCHEMA IF EXISTS venta_casas;
CREATE SCHEMA IF NOT EXISTS venta_casas;
USE VENTA_CASAS;

CREATE TABLE USUARIO (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    NOMBRE VARCHAR(50),
    APELLIDO varchar(50),
    EMAIL VARCHAR(100) UNIQUE,
    GENERO VARCHAR(50),
    CLAVE varchar(2000),
    ES_VENDEDOR BOOLEAN DEFAULT FALSE
);

CREATE TABLE VENDEDOR (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    ID_USUARIO INT,
    NUMERO_CUENTA INT NOT NULL
);
ALTER TABLE VENDEDOR
ADD FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID);

ALTER TABLE USUARIO
ADD ID_VENDEDOR INT;

ALTER TABLE USUARIO
ADD FOREIGN KEY (ID_VENDEDOR) REFERENCES VENDEDOR(ID);






CREATE TABLE COMPRADOR (
  ID INT PRIMARY KEY AUTO_INCREMENT,
  ID_USUARIO INT,
  METODO_PAGO VARCHAR(100) NOT NULL,
  CUENTA INT NOT NULL,
  CVV INT NOT NULL,
  FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID)
);

CREATE TABLE TERRENO (
  ID INT PRIMARY KEY AUTO_INCREMENT,
  ID_VENDEDOR INT,
  LOCALIZACION VARCHAR(100) NOT NULL,
  DESCRIPCION VARCHAR(100) NOT NULL,
  PRECIO DECIMAL(10,2) NOT NULL DEFAULT 0,
  FOREIGN KEY (ID_VENDEDOR) REFERENCES VENDEDOR(ID)
);

CREATE TABLE COMPRA (
  ID INT PRIMARY KEY AUTO_INCREMENT,
  ID_COMPRADOR INT NOT NULL,
  ID_TERRENO INT NOT NULL,
  FECHA_COMPRA DATE NOT NULL,
  FOREIGN KEY (ID_COMPRADOR) REFERENCES COMPRADOR(ID),
  FOREIGN KEY (ID_TERRENO) REFERENCES TERRENO(ID)
);

INSERT INTO USUARIO(NOMBRE, APELLIDO, EMAIL, GENERO, CLAVE) VALUES("usuario", "prueba", "mail@mail.com", "masculino", "$2y$10$R4IJRK8ceXDV8xiZsa0gTeOr4TWfPDFlBsuL3mC/yKKQLqpphIgMa");
INSERT INTO USUARIO(NOMBRE, APELLIDO, EMAIL, GENERO, CLAVE) VALUES("Carlos", "Rivera", "carlos@mail.com", "masculino", "$2y$10$R4IJRK8ceXDV8xiZsa0gTeOr4TWfPDFlBsuL3mC/yKKQLqpphIgMa");
INSERT INTO USUARIO(NOMBRE, APELLIDO, EMAIL, GENERO, CLAVE) VALUES("Catalina", "Bonilla", "cata@mail.com", "femenino", "$2y$10$R4IJRK8ceXDV8xiZsa0gTeOr4TWfPDFlBsuL3mC/yKKQLqpphIgMa");
INSERT INTO USUARIO(NOMBRE, APELLIDO, EMAIL, GENERO, CLAVE) VALUES("Juan", "Oviedo", "juan@mail.com", "masculino", "$2y$10$R4IJRK8ceXDV8xiZsa0gTeOr4TWfPDFlBsuL3mC/yKKQLqpphIgMa");

USE VENTA_CASAS;
SELECT * FROM VENDEDOR WHERE ID_USUARIO = 2 ORDER BY ID DESC LIMIT 1;


SELECT * FROM USUARIO;
SELECT * FROM VENDEDOR;
SELECT * FROM TERRENO;
SELECT * FROM COMPRADOR;
SELECT * FROM COMPRA;

~~~ 
### PHP 🐘
~~~PHP
UserModel.php
~~~

#### Todos Los archivos involucrados estan en pagina_web_corte_2
El resto de la lógica se puede ver dentro del proyecto, lo importante como el sql está en esta parte puesto que es lo unico que no se sube en github, lo demás como configuracion de la base de datos se deja como ejemplo a continuacion
En la misma carpeta de database, van a crear un archivo my_settings.ini con la siguiente estructura:
### [my_settings.ini]
~~~ini
[database]
driver = mysql
host = localhost
;port = 3306
schema = venta_casas
username = root
password = 1234
~~~
