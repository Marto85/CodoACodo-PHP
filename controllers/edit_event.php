<?php
session_start();

include '../models/db_config.php';

if (!empty($_SESSION['evento_id'])) {
    $eventoId = $_SESSION['evento_id'];
} elseif (!empty($_POST['evento_id'])) {
    $eventoId = $_POST['evento_id'];
} else {
    header("Location: admin_panel.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $fecha = $_POST['fecha'];
    $lugar = $_POST['lugar'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $destacado = ($categoria === "ninguno") ? 0 : (isset($_POST['importancia']) && $_POST['importancia'] === "destacado" ? 1 : 0);
    $imperdible = ($categoria === "ninguno") ? 0 : (isset($_POST['importancia']) && $_POST['importancia'] === "imperdible" ? 1 : 0);

    if (!empty($_POST['evento_id'])) {
        $_SESSION['evento_id'] = $_POST['evento_id'];
    }

    $fechaActual = date('Y-m-d');
    if (empty($titulo) || empty($fecha) || empty($lugar) || empty($categoria) || empty($descripcion) || ($categoria === "ninguno" && isset($_POST['importancia'])) || $fecha < $fechaActual) {
        $errorMessage = "Todos los campos son obligatorios y la fecha no puede ser anterior a la actual";
        echo "<script>document.addEventListener('DOMContentLoaded', function() { $('#errorModalBody').text('$errorMessage'); $('#errorModal').modal('show'); });</script>";
    } else {
        // Verifica si se proporciona una nueva imagen
        if ($_FILES['nueva_imagen']['error'] == UPLOAD_ERR_OK && !empty($_FILES['nueva_imagen']['tmp_name'])) {
            $info = getimagesize($_FILES['nueva_imagen']['tmp_name']);
            if ($info === FALSE) {
                echo "El archivo subido no es una imagen";
            } else {
                // Validar el tipo de archivo subido
                $allowedTypes = array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_WEBP);
                $detectedType = exif_imagetype($_FILES['nueva_imagen']['tmp_name']);
                if (!in_array($detectedType, $allowedTypes)) {
                    echo "Solo se permiten archivos de imagen JPEG, PNG o WEBP";
                } else {
                    // Obtener la imagen actual del evento
                    $sql = "SELECT path_imagen FROM eventos WHERE id = $eventoId";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $imagenActual = $row['path_imagen'];

                        // Eliminar la imagen actual si existe
                        if (!empty($imagenActual) && file_exists($imagenActual)) {
                            unlink($imagenActual);
                        }

                        // Mover la nueva imagen al directorio y actualizar la base de datos
                        $uploadDir = "../public/imgs/shows/";
                        $path_imagen = $uploadDir . uniqid() . basename($_FILES['nueva_imagen']['name']);

                        if (move_uploaded_file($_FILES['nueva_imagen']['tmp_name'], $path_imagen)) {
                            $stmt = $conn->prepare("UPDATE eventos SET titulo=?, fecha=?, lugar=?, categoria=?, descripcion=?, path_imagen=?, destacado=?, imperdible=? WHERE id=?");
                            $stmt->bind_param("ssssssiii", $titulo, $fecha, $lugar, $categoria, $descripcion, $path_imagen, $destacado, $imperdible, $eventoId);

                            if ($stmt->execute()) {
                                header("Location: ../views/admin_panel.php");
                                exit();
                            } else {
                                echo "Error en la actualización: " . $stmt->error;
                            }

                            $stmt->close();
                        } else {
                            echo "Error al subir la nueva imagen";
                        }
                    } else {
                        echo "Error al obtener la imagen actual del evento";
                    }
                }
            }
        } else {
            // No se proporcionó una nueva imagen, actualizar otros datos sin cambiar la imagen
            $stmt = $conn->prepare("UPDATE eventos SET titulo=?, fecha=?, lugar=?, categoria=?, descripcion=?, destacado=?, imperdible=? WHERE id=?");
            $stmt->bind_param("ssssssii", $titulo, $fecha, $lugar, $categoria, $descripcion, $destacado, $imperdible, $eventoId);

            if ($stmt->execute()) {
                header("Location: ../views/admin_panel.php");
                exit();
            } else {
                echo "Error en la actualización: " . $stmt->error;
            }

            $stmt->close();
        }
    }
} else {
    echo "Error al procesar el formulario";
}

$conn->close();
