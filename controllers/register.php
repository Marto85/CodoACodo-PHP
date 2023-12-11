<?php
include '../models/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $calle = $_POST["calle"];
    $altura = $_POST["altura"];
    $localidad = $_POST["localidad"];
    $partido = $_POST["partido"];
    $telefono = $_POST["telefono"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];

    if (empty($nombre) || empty($apellido) || empty($email) || empty($calle) || empty($altura) || empty($localidad) || empty($partido) || empty($telefono) || empty($password) || empty($confirmPassword)) {
        echo "Todos los campos son obligatorios";
    } elseif ($password != $confirmPassword) {
        echo "Las contraseñas no coinciden";
    } else {
        // Verifico si el usuario sube una imagen de perfil
        if ($_FILES['imagen_perfil']['error'] == UPLOAD_ERR_OK && !empty($_FILES['imagen_perfil']['tmp_name'])) {
            $info = getimagesize($_FILES['imagen_perfil']['tmp_name']);

            // Verifico si lo que se subió es una imagen
            if ($info === FALSE) {
                echo "El archivo subido no es una imagen";
            } else {
                // Directorio donde se almacenarán las imágenes de perfil
                $uploadDir = "../public/imgs/profiles/";

                // Nombre único para la imagen
                $profilePicture = $uploadDir . uniqid() . basename($_FILES['imagen_perfil']['name']);

                // Mover la imagen al directorio establecido más arriba
                if (move_uploaded_file($_FILES['imagen_perfil']['tmp_name'], $profilePicture)) {
                    // Resto del código para procesar el registro con la imagen subida
                    // ...

                    // Hash de la contraseña
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                    // Sentencia preparada para evitar inyección SQL
                    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, calle, altura, localidad, partido, telefono, password, imagen_perfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

                    // Vincular los parámetros
                    $stmt->bind_param("ssssisssss", $nombre, $apellido, $email, $calle, $altura, $localidad, $partido, $telefono, $hashedPassword, $profilePicture);

                    if ($stmt->execute()) {
                        // cookie de sesión vigente 30 minutos
                        $expiryTime = time() + (30 * 60);
                        setcookie("user_id", $conn->insert_id, $expiryTime, "/");
                        header("Location: ../index.php");
                    } else {
                        echo "Error en el registro: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Error al subir la imagen";
                }
            }
        } else {
            // Si el usuario no sube una imagen, asignar la imagen por defecto
            $profilePicture = "../public/imgs/profiles/default.jpg";

            // Resto del código para procesar el registro sin una imagen subida
            // ...

            // Hash de la contraseña
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Sentencia preparada para evitar inyección SQL
            $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, email, calle, altura, localidad, partido, telefono, password, imagen_perfil) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Vincular los parámetros
            $stmt->bind_param("ssssisssss", $nombre, $apellido, $email, $calle, $altura, $localidad, $partido, $telefono, $hashedPassword, $profilePicture);

            if ($stmt->execute()) {
                // cookie de sesión vigente 30 minutos
                $expiryTime = time() + (30 * 60);
                setcookie("user_id", $conn->insert_id, $expiryTime, "/");
                header("Location: ../index.php");
            } else {
                echo "Error en el registro: " . $stmt->error;
            }

            $stmt->close();
        }
    }
} else {
    echo "Acceso no permitido";
}
?>
