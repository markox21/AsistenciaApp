<?php
// Conexión a la base de datos (asegúrate de incluir tu archivo de conexión)
include_once 'models/conexion.php';

// Verificar si se recibió un término de búsqueda
if (isset($_POST['searchTerm'])) {
    // Obtener el término de búsqueda
    $searchTerm = $_POST['searchTerm'];

    // Establecer la conexión con la base de datos
    $conn = Conexion::conectar();

    // Preparar la consulta SQL para buscar trabajadores por nombre
    $sql = "SELECT * FROM usuarios WHERE nombre LIKE ?";

    // Preparar la sentencia
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $param = "%$searchTerm%";
    $stmt->bind_param("s", $param);

    // Ejecutar la consulta
    $stmt->execute();

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Mostrar los resultados como filas de tabla HTML
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>DNI</th>';
        echo '<th>Email</th>';
        echo '<th>Nombre</th>';
        echo '<th>Apellido</th>';
        echo '<th>Asistencia</th>';
        echo '<th>FechaHoraAsistencia<th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['DNI'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['nombre'] . '</td>';
            echo '<td>' . $row['apellido'] . '</td>';
            echo '<td>' . $row['asistencia'] . '</td>'; 
            echo '<td>' . $row['confAsisFecha'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        // Si no se encontraron resultados
        echo '<p>No se encontraron resultados.</p>';
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conn->close();
} else {
    // Si no se recibió ningún término de búsqueda
    echo '<p>No se especificó ningún término de búsqueda.</p>';
}
?>
