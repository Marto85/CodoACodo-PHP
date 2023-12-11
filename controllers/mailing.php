<?php
include '../models/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["eliminarId"])) {
        $eliminarId = $_POST["eliminarId"];
        $eliminarSql = $conn->prepare("DELETE FROM lista_correo WHERE id = ?");
        $eliminarSql->bind_param("i", $eliminarId);

        if ($eliminarSql->execute()) {
            $eliminarSql->close();
            $conn->close();
            // Redirige a la página que muestra el modal de eliminación exitosa
            header("Location: ../views/mailing_list.php");
            exit();
        } else {
            // En caso de error, redirige a la página con un parámetro de error
            header("Location: ../views/mailing_list.php?eliminacionExitosa=false&error=" . $eliminarSql->error);
            exit();
        }
    }

    // Actualización del registro
    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];

        $sql = $conn->prepare("UPDATE lista_correo SET nombre = ?, apellido = ?, email = ? WHERE id = ?");
        $sql->bind_param("sssi", $nombre, $apellido, $email, $id);

        if ($sql->execute()) {
            $sql->close();
            $conn->close();
            echo json_encode(['success' => true, 'message' => 'Registro actualizado con éxito']);
            exit();
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar el registro: ' . $sql->error]);
            exit();
        }
    }

    // Agregar nuevo registro
    if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"])) {
        $name = $_POST["nombre"];
        $lastName = $_POST["apellido"];
        $email = $_POST["email"];
        $defaultEstadoSuscripcion = 1;

        $sql = $conn->prepare("INSERT INTO lista_correo (nombre, apellido, email, estado_suscripcion) VALUES (?, ?, ?, ?)");
        $sql->bind_param("sssi", $name, $lastName, $email, $defaultEstadoSuscripcion);

        if ($sql->execute()) {
            session_start();
            $_SESSION['registroExitoso'] = true;
            $sql->close();
            $conn->close();
            header("Location: ../index.php");
            exit();
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al agregar el registro: ' . $sql->error]);
            exit();
        }
    }
}
$conn->close();
