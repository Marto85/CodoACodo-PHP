<?php
session_start();
include '../models/db_config.php';

// Obtener los valores del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $fechaObj = DateTime::createFromFormat('d-m-Y', $fecha);
    $fechaFormateada = $fechaObj->format('Y-m-d');
    $lugar = $_POST['lugar'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $destacado = ($categoria === "ninguno") ? 0 : (isset($_POST['importancia']) && $_POST['importancia'] === "destacado" ? 1 : 0);
    $imperdible = ($categoria === "ninguno") ? 0 : (isset($_POST['importancia']) && $_POST['importancia'] === "imperdible" ? 1 : 0);

    $fechaActual = date('Y-m-d');
    if (empty($titulo) || empty($fechaFormateada) || empty($lugar) || empty($categoria) || empty($descripcion) || ($categoria === "ninguno" && isset($_POST['importancia'])) || $fechaFormateada < $fechaActual) {
        $errorMessage = "Todos los campos son obligatorios y la fecha no puede ser anterior a la actual";
        echo "<script>document.addEventListener('DOMContentLoaded', function() { $('#errorModalBody').text('$errorMessage'); $('#errorModal').modal('show'); });</script>";
    } else {
        if ($_FILES['path_imagen']['error'] == UPLOAD_ERR_OK && !empty($_FILES['path_imagen']['tmp_name'])) {
            $info = getimagesize($_FILES['path_imagen']['tmp_name']);
            if ($info === FALSE) {
                echo "El archivo subido no es una imagen";
            } else {
                // Validar el tipo de archivo subido
                $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_WEBP);
                $detectedType = exif_imagetype($_FILES['path_imagen']['tmp_name']);
                if (!in_array($detectedType, $allowedTypes)) {
                    echo "Solo se permiten archivos de imagen JPEG, PNG o WEBP";
                } else {
                    $uploadDir = "../public/imgs/shows/";
                    $path_imagen = $uploadDir . uniqid() . basename($_FILES['path_imagen']['name']);
                    if (move_uploaded_file($_FILES['path_imagen']['tmp_name'], $path_imagen)) {
                        $stmt = $conn->prepare("INSERT INTO eventos (titulo, fecha, lugar, categoria, descripcion, path_imagen, destacado, imperdible) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("ssssssii", $titulo, $fechaFormateada, $lugar, $categoria, $descripcion, $path_imagen, $destacado, $imperdible);
                        if ($stmt->execute()) {
                            header("Location: ../views/admin_panel.php");
                            exit();
                        } else {
                            echo "Error en el registro: " . $stmt->error;
                        }
                        $stmt->close();
                    } else {
                        echo "Error al subir la imagen";
                    }
                }
            }
        } else {
            echo "Error al subir la imagen";
        }
    }
} else {
    echo "Error al procesar el formulario";
}
$conn->close();
