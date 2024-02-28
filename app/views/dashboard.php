<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-TueTQVHH3dqjOJLFb4ZlYdp5D6PNeCO/iv4p51LY8U6LNuzrKCQGBvlsmEgc7jV4dM8rX/lYl1dXOcTrT1G+zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Barra lateral -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Configuración</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Contenido principal -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
                <h1 class="h2 ">Dashboard</h1>
            </div>

    
    <!-- Botones para activar los modales -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUsuariosTotales">
        Ver Trabajadores Totales
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUsuariosAsistieron">
        Ver Trabajadores que Asistieron
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUsuariosFaltaron">
        Ver Trabajadores que Faltaron
    </button>

    <!-- Modal Usuarios Totales -->
    <div class="modal" id="modalUsuariosTotales">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Trabajadores Totales</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Tabla con usuarios totales -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($trabajadores as $trabajador) { ?>
                                <tr>
                                    <td><?php echo $trabajador['DNI']; ?></td>
                                    <td><?php echo $trabajador['email']; ?></td>
                                    <td><?php echo $trabajador['nombre']; ?></td>
                                    <td><?php echo $trabajador['apellido']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Usuarios que Asistieron -->
    <div class="modal" id="modalUsuariosAsistieron">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Trabajadores que Asistieron</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Tabla con usuarios que asistieron -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>FechaHoraAsistencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($trabajadoresAsistieron as $trabajador) { ?>
                                <tr>
                                    <td><?php echo $trabajador['DNI']; ?></td>
                                    <td><?php echo $trabajador['email']; ?></td>
                                    <td><?php echo $trabajador['nombre']; ?></td>
                                    <td><?php echo $trabajador['apellido']; ?></td>
                                    <td><?php echo $trabajador['confAsisFecha']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Usuarios que Faltaron -->
    <div class="modal" id="modalUsuariosFaltaron">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Trabajadores que Faltaron</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Tabla con usuarios que faltaron -->
                    <table class="table">
                    <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($trabajadoresFaltaron as $trabajador) { ?>
                                <tr>
                                    <td><?php echo $trabajador['DNI']; ?></td>
                                    <td><?php echo $trabajador['email']; ?></td>
                                    <td><?php echo $trabajador['nombre']; ?></td>
                                    <td><?php echo $trabajador['apellido']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="dashboard-box">
                <i class="fas fa-users dashboard-icon"></i>
                <h3>Trabajadores Totales</h3>
                <p>Total: <?php echo count($trabajadores); ?></p>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="dashboard-box-asistieron">
                <i class="fas fa-users dashboard-icon"></i>
                <h3>Trabajadores Asistieron</h3>
                <p>Total: <?php echo count($trabajadoresAsistieron); ?></p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-box-faltaron">
                <i class="fas fa-users dashboard-icon"></i>
                <h3>Trabajadores Faltaron</h3>
                <p>Total: <?php echo count($trabajadoresFaltaron); ?></p>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <input type="text" class="form-control" id="searchInput" placeholder="Buscar por nombre...">
</div>

<!-- Resultados de la búsqueda -->
<div id="searchResults">
    <!-- Los resultados de la búsqueda se mostrarán aquí -->
</div>

<script src = "./js/buscarTrabajador.js" ></script>
<script src="https://kit.fontawesome.com/a73a5c9a32.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
