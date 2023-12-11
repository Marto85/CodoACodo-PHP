<?php
include '../models/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validar los datos
    if (empty($email) || empty($password)) {
        echo "Todos los campos son obligatorios";
    } else {
        // Buscar el usuario en la base de datos por su correo electrónico
        $stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $hashedPassword);
            $stmt->fetch();

            // Verificar la contraseña
            if (password_verify($password, $hashedPassword)) {
                // cookie de sesion vigente 30 minutos
                $expiryTime = time() + (30 * 60);
                setcookie("user_id", $user_id, $expiryTime, "/");
                header("Location: ../index.php");
                exit(); // Importante: asegúrate de salir después de redirigir

            } else {
                echo "La contraseña es incorrecta";
            }
        } else {
            echo "El usuario no existe";
        }

        $stmt->close();
    }
} else {
    echo "Acceso no permitido";
}
