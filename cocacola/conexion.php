<?php

$hostname ='localhost';
$username='root';
$password='';
$database='asistencia';

$conn= new mysqli($hostname, $username, $password, $database);
// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
