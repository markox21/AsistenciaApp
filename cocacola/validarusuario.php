<?php
// Incluir el archivo de conexión
require_once 'conexion.php';

// Paso 2: Recibir datos del formulario de inicio de sesión
$email = $_POST['email'];
$password = $_POST['password'];

// Paso 3: Consultar la base de datos para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Credenciales válidas, no iniciar sesión aquí
    
    // Iniciar sesión y redirigir al usuario a la página de inicio
    session_start();
    $_SESSION['email'] = $email;
    header("Location: inicio.php");
    exit(); // Salir del script para evitar que se ejecute más código innecesario
} else {
    
    header("Location: index.php");
}
$conn->close();

