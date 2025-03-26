<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "citas_dentales";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM citas ORDER BY fecha DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Citas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Citas</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Cédula</th>
            <th>Servicio</th>
            <th>Descripción</th>
            <th>Fecha</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['nombre']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['telefono']}</td>
                        <td>{$row['cedula']}</td>
                        <td>{$row['servicio']}</td>
                        <td>{$row['descripcion']}</td>
                        <td>{$row['fecha']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No hay citas registradas</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
