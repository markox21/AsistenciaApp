<?php

include_once 'conexion.php';
$email = $_POST['email'];
$password = $_POST['password'];


$validar=$conn->prepare("SELECT * FROM usuarios where email=? AND password=?");
$validar->bind_param('ss', $email,$password);
$validar->execute();

$resultado = $validar->get_result();
if($fila = $resultado->fetch_assoc()){
    echo json_encode($fila,JSON_UNESCAPED_UNICODE);
}
$resultado->close();
$conn->close();
