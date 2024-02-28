<?php
include_once 'conexion.php';

// Consulta para obtener el nombre del usuario
$sql = "SELECT nombre FROM usuarios LIMIT 1"; // Cambia 'usuarios' por el nombre de tu tabla de usuarios si es diferente

$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    // Obtener el primer registro
    $row = $resultado->fetch_assoc();
    $nombreUsuario = $row["nombre"];
    
    // Devolver el nombre del usuario como respuesta
    echo $nombreUsuario;
} else {
    // Si no se encontraron registros, devolver un mensaje de error
    echo "No se encontraron usuarios.";
}

// Cerrar conexión
$conn->close();

