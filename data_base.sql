-- Active: 1686348933709@@127.0.0.1@3306@supermarket
CREATE DATABASE supermarket;

USE supermarket;

CREATE TABLE  categorias(
    categoria_id INT primary key AUTO_INCREMENT,
    nombre VARCHAR (50),
    descripcion VARCHAR (50),
    imagen MEDIUMBLOB
);

CREATE TABLE clientes(
    cliente_id INT primary key AUTO_INCREMENT,
    nombre VARCHAR (50) NOT NULL,
    celular INT NOT NULL,
    compañia VARCHAR (50) NOT NULL 
);



CREATE TABLE empleados(
    empleado_id INT primary key AUTO_INCREMENT,
    nombre VARCHAR(50),
    celular INT, 
    direccion VARCHAR (50)
);


CREATE TABLE facturas(

    factura_id INT primary key AUTO_INCREMENT,
    empleado_id INT,
    cliente_id INT, 
    fecha DATE,
    FOREIGN KEY (empleado_id) REFERENCES  empleados(empleado_id),
    FOREIGN KEY (cliente_id) REFERENCES clientes(cliente_id)
);




CREATE TABLE proveedores (

    proveedor_id INT primary key AUTO_INCREMENT,
    nombre VARCHAR(60),
    telefono VARCHAR(50),
    ciudad VARCHAR(60)
);

CREATE TABLE FacturaDetalle(

    factura_id INT,
    producto_id INT,
    cantidad INT,
    precio_venta INT
);

CREATE TABLE productos(

    producto_id INT primary key AUTO_INCREMENT,
    categoria_id INT,
    precio_unitario INT,
    stock INT,
    unidades_pedidas INT,
    proveedor_id INT,
    nombre_producto VARCHAR(50),
    descontinuado VARCHAR(50),
    Foreign Key (categoria_id) REFERENCES categorias(categoria_id),
    Foreign Key (proveedor_id) REFERENCES proveedores(proveedor_id)
);

CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    empleado_id INT NOT NULL,
    email VARCHAR(80),
    username VARCHAR(80) NOT NULL,
    password VARCHAR(80) NOT NULL,
    Foreign Key (empleado_id) REFERENCES empleados(empleado_id)
)

