<?php
$servername = "localhost";
$username = "root";  // Cambia según tu configuración
$password = "";  // Cambia según tu configuración
$dbname = "citas_dentales";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['name'];
$email = $_POST['email'];
$telefono = $_POST['phone'];
$cedula = $_POST['id'];
$servicio = $_POST['service'];
$descripcion = isset($_POST['other-description']) ? $_POST['other-description'] : '';

// Insertar en la base de datos
$sql = "INSERT INTO citas (nombre, email, telefono, cedula, servicio, descripcion) 
        VALUES ('$nombre', '$email', '$telefono', '$cedula', '$servicio', '$descripcion')";

if ($conn->query($sql) === TRUE) {
    echo "Cita guardada correctamente";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
