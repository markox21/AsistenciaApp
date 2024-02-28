<?php
class Conexion {
    private static $servername = "localhost"; // Cambia esto por tu servidor de base de datos
    private static $username = "root"; // Cambia esto por tu nombre de usuario de la base de datos
    private static $password = ""; // Cambia esto por tu contraseña de la base de datos
    private static $database = "asistencia"; // Cambia esto por el nombre de tu base de datos
    private static $conn;

    public static function conectar() {
        // Verificar si ya hay una conexión establecida
        if (!isset(self::$conn)) {
            // Crear una nueva conexión si no existe una
            self::$conn = new mysqli(self::$servername, self::$username, self::$password, self::$database);

            // Verificar si hubo algún error en la conexión
            if (self::$conn->connect_error) {
                die("Error de conexión: " . self::$conn->connect_error);
            }
        }

        // Devolver la conexión
        return self::$conn;
    }
}
?>
