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
$nombre_propietario = $_POST['nombre_propietario'];
$nombre = $_POST['nombre'];
$especie = $_POST['especie'];
$sexo = $_POST['sexo'];
$peso = $_POST['peso'];
$edad = $_POST['edad'];
$id_paciente = $_POST['id_paciente']; // Asegúrate de incluir este campo en el formulario

// Preparar y ejecutar la consulta SQL para modificar el paciente
$sql = "UPDATE pacientes SET nombre_propietario = ?, nombre = ?, especie = ?, sexo = ?, peso = ?, edad = ? WHERE id_paciente = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssii", $nombre_propietario, $nombre, $especie, $sexo, $peso, $edad, $id_paciente);

if ($stmt->execute()) {
    echo "Paciente modificado correctamente.";
} else {
    echo "Error al modificar el paciente: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
