<?php
include_once 'conexion.php';

if (isset($_POST['codigo']) && !empty($_POST['codigo'])) {
    $codigoIngresado = $_POST['codigo'];
    $currentTime = date('Y-m-d H:i:s');

    $stmt = $conn->prepare("UPDATE usuarios SET asistencia = 1, confAsisFecha = ? WHERE codigo = ?");
    $stmt->bind_param("ss", $currentTime, $codigoIngresado); // Enlazar el parámetro del código

    // Ejecutar la consulta de actualización
    $stmt->execute();

    // Verificar cuántas filas fueron afectadas por la consulta de actualización
    $filas_afectadas = $stmt->affected_rows;

    // Cerrar la declaración
    $stmt->close();
    
    // Cerrar la conexión
    $conn->close();

    if ($filas_afectadas > 0) {
        // Si al menos una fila fue actualizada, enviar una respuesta de éxito
        echo json_encode(array("success" => true, "message" => "¡Asistencia confirmada!"));
    } else {
        // Si ninguna fila fue actualizada (es decir, el código no se encontró), enviar una respuesta de error
        echo json_encode(array("success" => false, "message" => "El código ingresado es incorrecto"));
    }
} else {
    // Enviar una respuesta de error a la aplicación si no se proporciona el código en la solicitud POST
    echo json_encode(array("success" => false, "message" => "No se proporcionó el código en la solicitud"));
}

