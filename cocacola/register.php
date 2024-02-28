<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<title>Registro de Usuario</title>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h2>Registro de Usuario</h2>
                </div>
                <div class="card-body">
                    <form id="registrationForm">
                        <div class="form-group">
                            <label for="documentNumber">DNI:</label>
                            <input type="text" name="documentNumber" class="form-control" id="documentNumber" placeholder="Ingrese el número de DNI" required>
                        </div>
                        <div class="form-group">
                            <label for="nombres">Nombres:</label>
                            <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Nombres (Como está en tu DNI)" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos:</label>
                            <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos (Como está en tu DNI)" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/registro.js"></script>
<script src="js/rucdni.js"></script>


</body>
</html>
