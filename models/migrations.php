<?php
    include './db_config.php';

    
// Crear tabla de usuarios
$sql = "CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    apellido VARCHAR(30),
    email VARCHAR(255) UNIQUE,
    calle VARCHAR(30),
    altura INT,
    localidad VARCHAR(30),
    partido VARCHAR(30),
    provincia VARCHAR(30),
    telefono VARCHAR(30),
    password VARCHAR(255),
    imagen_perfil VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla usuarios creada con éxito<br>";
} else {
    echo "Error al crear la tabla usuarios: " . $conn->error . "<br>";
}

// Crear tabla de lista de correo
$sql = "CREATE TABLE lista_correo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    apellido VARCHAR(30),
    email VARCHAR(30) UNIQUE,
    estado_suscripcion BOOLEAN
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla lista_correo creada con éxito<br>";
} else {
    echo "Error al crear la tabla lista_correo: " . $conn->error . "<br>";
}

// Crear tabla de eventos
$sql = "CREATE TABLE eventos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(30),
    fecha DATE,
    lugar VARCHAR(30),
    categoria VARCHAR(30),
    descripcion TEXT,
    path_imagen VARCHAR(30),
    destacado BOOLEAN,
    imperdible BOOLEAN
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla eventos creada con éxito<br>";
} else {
    echo "Error al crear la tabla eventos: " . $conn->error . "<br>";
}

// Crear tabla de compras
$sql = "CREATE TABLE compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_evento INT,
    cantidad_entradas INT,
    precio_total DECIMAL(10, 2),
    estado VARCHAR(30),
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_evento) REFERENCES eventos(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla compras creada con éxito<br>";
} else {
    echo "Error al crear la tabla compras: " . $conn->error . "<br>";
}

// Crear tabla de historial de compras
$sql = "CREATE TABLE historial_compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_compra INT,
    fecha_compra DATE,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_compra) REFERENCES compras(id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla historial_compras creada con éxito<br>";
} else {
    echo "Error al crear la tabla historial_compras: " . $conn->error . "<br>";
}

$conn->close();

