DROP SCHEMA IF EXISTS venta_casas;
CREATE SCHEMA IF NOT EXISTS venta_casas;
USE VENTA_CASAS;
DROP TABLE IF EXISTS USUARIO;

CREATE TABLE usuario (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50),
  apellido varchar(50),
  email VARCHAR(100),
  genero VARCHAR(50),
  clave varchar(2000),
  es_vendedor BOOLEAN DEFAULT FALSE
);

CREATE TABLE vendedor (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_usuario INT,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);

CREATE TABLE comprador (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_usuario INT,
  FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);

CREATE TABLE terreno (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_vendedor INT,
  descripcion VARCHAR(100),
  precio DECIMAL(10,2),
  FOREIGN KEY (id_vendedor) REFERENCES vendedor(id)
);

CREATE TABLE compra (
  id_compra INT PRIMARY KEY AUTO_INCREMENT,
  id_comprador INT,
  id_terreno INT,
  fecha_compra DATE,
  FOREIGN KEY (id_comprador) REFERENCES comprador(id),
  FOREIGN KEY (id_terreno) REFERENCES terreno(id)
);

INSERT INTO USUARIO(NOMBRE, APELLIDO, EMAIL, GENERO, CLAVE) VALUES("usuario", "prueba", "mail@mail.com", "masculino", "$2y$10$R4IJRK8ceXDV8xiZsa0gTeOr4TWfPDFlBsuL3mC/yKKQLqpphIgMa");


SELECT * FROM USUARIO;