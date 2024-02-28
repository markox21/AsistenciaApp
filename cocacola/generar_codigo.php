<?php
// Iniciar la sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    echo "Error: No se ha iniciado sesión.";
    exit;
}

// Incluir el archivo de conexión a la base de datos
include_once 'conexion.php';

// Obtener el correo electrónico del usuario actual
$email = $_SESSION['email'];

// Obtener el código asociado al usuario actual desde la base de datos
$stmt = $conn->prepare("SELECT codigo, codigo_fecha FROM usuarios WHERE email = ? LIMIT 1");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($codigo, $codigo_fecha);
$stmt->fetch();
$stmt->close();

// Verificar si el usuario ya tiene un código y si ha pasado el tiempo especificado desde la última generación del código
if ($codigo && strtotime($codigo_fecha) >= (time() - (23 * 3600 + 59 * 60))) {
    // Devolver el código existente
    echo $codigo;
} else {
    // Si el usuario no tiene un código o ha pasado el tiempo especificado, generar uno nuevo
    $randomCode = generateRandomCode();

    // Actualizar el código y la marca de tiempo en la base de datos
    $currentTime = date('Y-m-d H:i:s');
    $stmt = $conn->prepare("UPDATE usuarios SET codigo = ?, codigo_fecha = ? WHERE email = ?");
    $stmt->bind_param("sss", $randomCode, $currentTime, $email);
    $stmt->execute();
    $stmt->close();

    // Devolver el nuevo código generado
    echo $randomCode;
}

// Función para generar un código aleatorio
function generateRandomCode() {
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $codeLength = 5;
    $randomCode = "";
    for ($i = 0; $i < $codeLength; $i++) {
        $randomCode .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomCode;
}
