<?php
session_start();
include '../models/db_config.php';

// Obtener los valores del formulario
$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$lugar = $_POST['lugar'];
$categoria = $_POST['categoria'];
$descripcion = $_POST['descripcion'];
$path_imagen = $_POST['path_imagen'];
$destacado = ($categoria === "ninguno") ? 0 : (isset($_POST['destacado']) ? 1 : 0);
$imperdible = ($categoria === "ninguno") ? 0 : (isset($_POST['imperdible']) ? 1 : 0);

// Preparar la consulta SQL utilizando una consulta preparada
$sql = "INSERT INTO eventos (titulo, fecha, lugar, categoria, descripcion, path_imagen, destacado, imperdible)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssii", $titulo, $fecha, $lugar, $categoria, $descripcion, $path_imagen, $destacado, $imperdible);

if ($stmt->execute()) {
    echo "Evento creado exitosamente";
} else {
    echo "Error al crear el evento: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
