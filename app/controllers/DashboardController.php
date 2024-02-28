<?php
include_once './models/Trabajador.php';

class DashboardController {
    public function obtenerTrabajadores() {
        // Llamar a la función en el modelo para obtener todos los usuarios
        $trabajadores = Trabajador::obtenerTodos();
        
        // Devolver los usuarios obtenidos
        return $trabajadores;
    }
}

class AsistieronController {
    public function obtenerTrabajadoresAsistieron() {
        // Llamar a la función en el modelo para obtener los trabajadores que asistieron
        $trabajadoresAsistieron = Trabajador::obtenerAsistieron();
        
        // Devolver los usuarios que asistieron
        return $trabajadoresAsistieron;
    }
}

class FaltaronController {
    public function obtenerTrabajadoresFaltaron() {
        // Llamar a la función en el modelo para obtener los trabajadores que asistieron
        $trabajadoresFaltaron = Trabajador::obtenerFaltaron();
        
        // Devolver los usuarios que asistieron
        return $trabajadoresFaltaron;
    }
}

// Instanciar los controladores
$dashboardController = new DashboardController();
$asistieronController = new AsistieronController();
$faltaronController = new FaltaronController();

// Obtener los datos necesarios para el dashboard

$trabajadores = $dashboardController->obtenerTrabajadores();
$trabajadoresAsistieron = $asistieronController->obtenerTrabajadoresAsistieron();
$trabajadoresFaltaron = $faltaronController->obtenerTrabajadoresFaltaron();

?>







































<!-- 

require_once('../models/Asistencia.php');
require_once('../models/Trabajador.php');

class DashboardController {
    private $connection;
    public function __construct($connection) {
        $this->connection = $connection;
    }
    
    private function getFechaActual() {
        return date('Y-m-d');
    }
    
    public function showDashboardAsistenciaDiaria() {
        $fecha = $this->getFechaActual();
        
        // Obtener las asistencias del día
        
        $asistencias = Asistencia::findAsistenciaDiaria($this->connection, $fecha);
        
        // Obtener los nombres de los trabajadores
        
        $nombres_trabajadores = array();
        foreach ($asistencias as $asistencia) {
            $trabajador = Trabajador::findById($this->connection, $asistencia->getTrabajadorId());
            $nombres_trabajadores[$asistencia->getId()] = $trabajador->getNombre() . " " . $trabajador->getApellido();
        }
        
        // Mostrar la vista del dashboard
        
        include('../views/dashboard_asistencia_diaria.php');
    }

    public function showDashboardFaltasAsistencia() {
        $fecha_inicio = date('Y-m-01');
        $fecha_fin = date('Y-m-t');

        // Obtener las faltas de asistencia
        
        $faltas = Asistencia::findFaltasAsistenciaDiaria($this->connection, $fecha_inicio, $fecha_fin);
        
        // Obtener los nombres de los trabajadores
        
        $nombres_trabajadores = array();
        foreach ($faltas as $falta) {
            $trabajador = Trabajador::findById($this->connection, $asistencia->getId());
            $nombres_trabajadores[$falta->getId()] = $trabajador->getNombre() . " " . $trabajador->getApellido();
        }
        // Mostrar la vista del dashboard
        include('../views/dashboard_faltas_asistencia.php');
    }
    
    public function showDashboardTrabajadores() {
        
        // Obtener todos los trabajadores
        
        $trabajadores = Trabajador::findAll($this->connection);
        
        // Mostrar la vista del dashboard
        include('../views/dashboard_trabajadores.php');
    }
}
 -->

