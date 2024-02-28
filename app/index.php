<?php
include_once 'controllers/DashboardController.php';

// Instanciar los controladores
$dashboardController = new DashboardController();
$asistieronController = new AsistieronController();
$faltaronController = new FaltaronController();

// Obtener los datos de los trabajadores
$trabajadores = $dashboardController->obtenerTrabajadores();
$trabajadoresAsistieron = $asistieronController->obtenerTrabajadoresAsistieron();
$trabajadoresFaltaron = $faltaronController->obtenerTrabajadoresFaltaron();
// Calcular el total de usuarios
$usuariosTotales = count($trabajadores);

// Calcular cuántos usuarios asistieron
$usuariosAsistieron = count($trabajadoresAsistieron);

$usuariosFaltaron = count($trabajadoresFaltaron);

// Incluir la vista del dashboard
include 'views/dashboard.php';

?>
