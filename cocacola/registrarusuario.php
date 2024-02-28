<?php
// Incluir el archivo de conexión
include_once 'conexion.php';

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$documentNumber = $_POST['documentNumber'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$password = $_POST['password'];

// Preparar la consulta SQL para evitar inyecciones de SQL
$stmt = $conn->prepare("INSERT INTO usuarios (DNI, nombre, apellido, email, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $documentNumber, $nombres, $apellidos, $email, $password);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "Registro exitoso";
} else {
    echo "Error al registrar el usuario: " . $stmt->error;
}

// Cerrar la consulta
$stmt->close();

// Cerrar la conexión
$conn->close();

