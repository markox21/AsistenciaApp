    // Función para realizar la búsqueda
    function search() {
        var searchTerm = $('#searchInput').val();
        
        // Realizar la solicitud Ajax al servidor
        $.ajax({
            type: 'POST',
            url: './buscar_trabajador.php', // Ruta al script PHP que manejará la búsqueda en la base de datos
            data: { searchTerm: searchTerm },
            success: function(response) {
                $('#searchResults').html(response); // Mostrar los resultados en el contenedor de resultados
            }
        });
    }

    // Escuchar el evento de entrada en el campo de búsqueda
    $('#searchInput').on('input', search);