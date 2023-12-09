<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
include '../models/db_config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["nombre"];
    $lastName = $_POST["apellido"];
    $email = $_POST["email"];
    $defaultEstadoSuscripcion = 1;

    // Consulta preparada para prevenir inyecciones SQL
    $sql = $conn->prepare("INSERT INTO lista_correo (nombre, apellido, email, estado_suscripcion) VALUES (?, ?, ?, ?)");
    $sql->bind_param("sssi", $name, $lastName, $email, $defaultEstadoSuscripcion);

    if ($sql->execute()) {
        // Operación exitosa, establece una variable de sesión
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

$conn->close();
?>