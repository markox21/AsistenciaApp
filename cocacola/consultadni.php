<?php
// Obtener el DNI enviado por POST
$dni = $_POST["dni"];

// Validar la longitud del DNI
if(strlen($dni) !== 8) {
    // Devolver un mensaje de error si la longitud del DNI no es 8
    echo json_encode(array("error" => "El DNI debe tener 8 caracteres"));
} else {
    // Realizar la solicitud a la API
    $url = 'https://api.apis.net.pe/v1/dni?numero=' . $dni;
    $response = file_get_contents($url);

    // Devolver la respuesta de la API
    echo $response;
}

