<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto si tu servidor es diferente
$username = "root"; // Cambia si es necesario
$password = ""; // Deja en blanco si no hay contraseña
$dbname = "veterinaria"; // Nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$cantidad_exist = $_POST['existencia']; // Cambiado a "cantidad_exist"

// Preparar y ejecutar la consulta SQL
$sql = "INSERT INTO productos (nombre, descripcion, precio, cantidad_exist) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $cantidad_exist);

if ($stmt->execute()) {
    echo "Producto insertado correctamente.";
} else {
    echo "Error al insertar el producto: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
