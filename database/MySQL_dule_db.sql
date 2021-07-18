--CAMBIOS by Karen 18/04/2021
--Se modificó la tabla Usuario


CREATE DATABASE dule;

USE DULE;
CREATE TABLE ROL(
	idRol INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	rol VARCHAR(12) NOT NULL,
	PRIMARY KEY (idRol)
);

INSERT INTO ROL (rol)
VALUES ('cliente'),
('admin');

CREATE TABLE BITACORA(
	idBitacora INT UNSIGNED NOT NULL AUTO_INCREMENT,
    idUsuario INT UNSIGNED NOT NULL, 
	fecha TIMESTAMP NOT NULL, 
    evento NVARCHAR(255) NOT NULL,
PRIMARY KEY (idBitacora)
);

-- INSERT INTO BITACORA(idUsuario, fecha, evento)
-- VALUES(1, '2021-02-02', 'ERROR: Usuario Inválido');

CREATE TABLE PROVINCIA(
idProvincia INT UNSIGNED NOT NULL AUTO_INCREMENT, 
provincia VARCHAR(50) NOT NULL,
PRIMARY KEY (idProvincia)
);

INSERT INTO PROVINCIA (provincia)
VALUES ('Alajuela'),
('Cartago'),
('Guanacaste'),
('Heredia'),
('Limón'),
('Puntarenas'),
('San José');

CREATE TABLE `usuario` (
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `idRol` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `contrasena` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idProvincia` int(10) UNSIGNED DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `noTarjeta` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `fechaV` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- INSERT INTO USUARIO (idrol, nombre, apellido, tel, email, contraseña, idProvincia, direccion, noTarjeta, fechaV)
-- VALUES (1, 'Jairo', 'Tabash Jimenez', '7700-0000','jairot@gmail.com', MD5('123'), 4, 'Central Heredia', '2041-2321-2415', '2021-02-02');
       
  CREATE TABLE FACTURA (
  idFactura INT UNSIGNED NOT NULL AUTO_INCREMENT,
  idUsuario INT UNSIGNED NOT NULL,
  fecha TIMESTAMP NOT NULL,
  subTotal FLOAT NOT NULL,
  iva FLOAT NOT NULL,
  total FLOAT NOT NULL,
  metodoPago VARCHAR(20) NOT NULL,
  terminos boolean NOT NULL,
  PRIMARY KEY (idFactura)
);

-- INSERT INTO FACTURA (idUsuario, fecha, subTotal, iva, total, metodoPago, terminos)
-- VALUES ('1', '2021-04-12', '15000', '1950', '16950', 'Tarjeta', '1');
    

CREATE TABLE DETALLEFACTURA (
  idDetalle INT UNSIGNED NOT NULL AUTO_INCREMENT, 
  idFactura INT UNSIGNED NOT NULL,
  idProducto INT UNSIGNED  NOT NULL,
  cantidad INT NOT NULL,
  total FLOAT NOT NULL,
  PRIMARY KEY (idDetalle)
);

-- INSERT INTO DETALLEFACTURA (idFactura, idProducto, cantidad, total)
-- VALUES ('1', '1',3, '15000');

CREATE TABLE `producto` (
  `idProducto` int(10) UNSIGNED NOT NULL,
  `idCategoria` int(10) UNSIGNED NOT NULL,
  `producto` varchar(50) NOT NULL,
  `precioUnitario` float NOT NULL,
  `existencias` int(10) UNSIGNED NOT NULL,
  `imagen` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `idCategoria`, `producto`, `precioUnitario`, `existencias`, `imagen`) VALUES
(2, 2, 'Café Tamarindo', 2000, 2, '../img/products/tamarindo-coffee-roasters-organic.jpg'),
(3, 2, 'Toallas Bamboo', 5000, 5, '../img/products/bamboo-eco-towels.jpg'),
(4, 2, 'Pan Sesamo', 7000, 5, '../img/products/Bread_Sesame.png'),
(5, 2, 'Curitas', 6000, 5, '../img/products/carbon_banditas.jpg'),
(6, 2, 'Exfoliante', 10000, 6, '../img/products/carbon_body_scrub.jpg'),
(7, 2, 'Pasta Dental', 10000, 6, '../img/products/carbon_dental.jpeg'),
(8, 2, 'Carbón en polvo', 10000, 6, '../img/products/carbon_polvo.jpg'),
(9, 2, 'Cepillo', 2000, 6, '../img/products/cepillo.png'),
(10, 2, 'Kit Cepillo', 10000, 6, '../img/products/cepillo_dental.png'),
(11, 2, 'Queso', 10000, 6, '../img/products/Cheese.png'),
(12, 2, 'Dip', 6000, 6, '../img/products/Dip.png'),
(13, 2, 'Rollo Bamboo', 10000, 6, '../img/products/rolled-bamboo.jpg'),
(14, 2, 'Tapa de dulce', 10000, 6, '../img/products/dulce-tapa.jpeg'),
(15, 2, 'Papel Higiénico', 10000, 6, '../img/products/toilet-paper-colouring.png'),
(16, 2, 'Aplicadores', 1000, 6, '../img/products/aplicadores.png'),
(17, 2, 'Azafran', 10000, 6, '../img/products/azafran.png'),
(18, 2, 'Aloe', 8000, 6, '../img/products/aloe.jpg'),
(19, 2, 'Aceite de coco', 5000, 6, '../img/products/aceite_coco.jpg'),
(20, 2, 'Mantequilla Aloe', 30000, 6, '../img/products/aloe_butter.jpg'),
(21, 2, 'Gel Aloe', 3000, 6, '../img/products/aloe_gel.jpg');

 CREATE TABLE CATEGORIA (
  idCategoria INT UNSIGNED NOT NULL AUTO_INCREMENT, 
  categoria VARCHAR(50) NOT NULL,
  PRIMARY KEY (idCategoria)
);

INSERT INTO CATEGORIA (categoria)
VALUES  ('Abarrotes'),
('Carnes y mariscos'),
('Cuidado personal'),
('Frutas y Verduras'),
('Lacteos y embutidos'),
('Limpieza'),
('Mascotas');

       
 /*===================================================*/
-- #CREAR FOREIGN KEYS
/*===================================================*/      

ALTER TABLE BITACORA
ADD FOREIGN KEY (idUsuario) REFERENCES USUARIO(idUsuario);

ALTER TABLE USUARIO
ADD FOREIGN KEY (idRol) REFERENCES ROL(idRol),
ADD FOREIGN KEY (idProvincia) REFERENCES PROVINCIA(idProvincia);

ALTER TABLE FACTURA
ADD FOREIGN KEY (idUsuario) REFERENCES USUARIO(idUsuario);

ALTER TABLE DETALLEFACTURA
ADD FOREIGN KEY (idFactura) REFERENCES FACTURA(idFactura),
ADD FOREIGN KEY (idProducto) REFERENCES PRODUCTO(idProducto);

ALTER TABLE PRODUCTO
ADD FOREIGN KEY (idCategoria) REFERENCES CATEGORIA(idCategoria);
