<?php

// ------------- Configuracion para conexion a db en 000WebHost ---------------
// Configuración de la conexión a la base de datos
// $servername = "localhost";
// $username = "id21615585_martodev";
// $password = "OradoresCodo2023$";
// $dbname = "id21615585_oradores2023";


// ------------- Configuracion para conexion a db local ---------------
$servername = "localhost";
$username = "root";
$password = "Felix2020";
$dbname = "eventia";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

