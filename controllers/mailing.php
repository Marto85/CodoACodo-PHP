<?php
include '../models/db_config.php';

// Verifica si se ha enviado una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica si se ha enviado un ID para eliminar
    if (isset($_POST["eliminarId"])) {
        $eliminarId = $_POST["eliminarId"];

        $eliminarSql = $conn->prepare("DELETE FROM lista_correo WHERE id = ?");
        $eliminarSql->bind_param("i", $eliminarId);

        if ($eliminarSql->execute()) {

            $eliminarSql->close();
            $conn->close();

            header("Location: ../views/mailing_list.php");
            exit();
        } else {
            echo "Error al intentar eliminar el registro: " . $eliminarSql->error;
        }

        $eliminarSql->close();
    }

    if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"])) {
        $name = $_POST["nombre"];
        $lastName = $_POST["apellido"];
        $email = $_POST["email"];
        $defaultEstadoSuscripcion = 1;

        // Consulta preparada para prevenir inyecciones SQL
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
            echo "Error: " . $sql->error;
        }

        $sql->close();
    }

    // Verifica si se ha enviado un ID para actualizar
    if (isset($_POST["accion"]) && $_POST["accion"] == "actualizar" && isset($_POST["id"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];

        $actualizarSql = $conn->prepare("UPDATE lista_correo SET nombre = ?, apellido = ?, email = ? WHERE id = ?");
        $actualizarSql->bind_param("sssi", $nombre, $apellido, $email, $id);

        if ($actualizarSql->execute()) {
            echo "actualizacionExitosa";
            $actualizarSql->close();
            $conn->close();
            exit();
        } else {
            echo "Error al intentar actualizar el registro: " . $actualizarSql->error;
        }

        $actualizarSql->close();
    }
 
}

$conn->close();
