<?php
include_once 'conexion.php';

class Trabajador {
    private static $conn; // Variable estática para almacenar la conexión

    // Método estático para establecer la conexión
    private static function conectar() {
        if (!isset(self::$conn)) {
            self::$conn = Conexion::conectar(); // Establecer la conexión con la base de datos
        }
        return self::$conn;
    }

    public static function obtenerTodos() {
        $conn = self::conectar(); // Obtener la conexión
        
        // Query para seleccionar todos los trabajadores
        $sql = "SELECT * FROM usuarios";
        
        // Ejecutar la consulta
        $result = $conn->query($sql);

        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Crear un array para almacenar los trabajadores
            $trabajadores = array();
            
            // Iterar sobre los resultados y almacenarlos en el array
            while ($row = $result->fetch_assoc()) {
                $trabajadores[] = $row;
            }
            
            // Devolver el array de trabajadores
            return $trabajadores;
        } else {
            // Si no hay trabajadores, devolver un array vacío
            return array();
        }
    }

    public static function obtenerAsistieron() {
        $conn = self::conectar(); // Obtener la conexión
        
        // Query para seleccionar los trabajadores que asistieron
        $query = "SELECT * FROM usuarios WHERE asistencia = 1";
        
        // Ejecutar la consulta
        $result = $conn->query($query);
        
        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Crear un array para almacenar los trabajadores que asistieron
            $trabajadoresAsistieron = array();
            
            // Iterar sobre los resultados y almacenarlos en el array
            while ($row = $result->fetch_assoc()) {
                $trabajadoresAsistieron[] = $row;
            }
            
            // Devolver el array de trabajadores que asistieron
            return $trabajadoresAsistieron;
        } else {
            // Si no hay trabajadores que asistieron, devolver un array vacío
            return array();
        }
    }

    public static function obtenerFaltaron() {
        $conn = self::conectar(); // Obtener la conexión
        
        // Query para seleccionar los trabajadores que asistieron
        $que = "SELECT * FROM usuarios WHERE asistencia = 0";
        
        // Ejecutar la consulta
        $result = $conn->query($que);
        
        // Verificar si hay resultados
        if ($result->num_rows > 0) {
            // Crear un array para almacenar los trabajadores que asistieron
            $trabajadoresFaltaron = array();
            
            // Iterar sobre los resultados y almacenarlos en el array
            while ($row = $result->fetch_assoc()) {
                $trabajadoresFaltaron[] = $row;
            }
            
            // Devolver el array de trabajadores que asistieron
            return $trabajadoresFaltaron;
        } else {
            // Si no hay trabajadores que asistieron, devolver un array vacío
            return array();
        }
    }
}


?>

























<!-- 

class Trabajador {
    private $id;
    private $dni;
    private $nombre;
    private $apellido;
    private $correo;
    private $contrasena;
    private $cargo;
    private $departamento_id;

    public function __construct($id, $dni, $nombre, $apellido, $correo, $contrasena, $cargo, $departamento_id) {
        $this->id = $id;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->cargo = $cargo;
        $this->departamento_id = $departamento_id;
    }
    public function getId() {
        return $this->id;
    }
    
    public function getDni() {
        return $this->dni;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function getApellido() {
        return $this->apellido;
    }
    
    public function getCorreo() {
        return $this->correo;
    }
    
    public function getContrasena() {
        return $this->contrasena;
    }

    public function getCargo() {
        return $this->cargo;
    }


    public function getDepartamentoId() {
        return $this->departamento_id;
    }
    
}

?> -->
