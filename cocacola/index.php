<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Inicio de Sesión</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      padding: 0;
      background-image: url('img/fondo_login.jpg'); /* Ruta a tu imagen de fondo */
      background-size: cover; /* Ajusta el tamaño de la imagen para cubrir toda la pantalla */
      background-position: center; /* Centra la imagen */
    }
    .container-fluid {
      height: 100vh; /* 100% de la altura del viewport */
    }
    img {
      max-width: 100%;
      height: auto;
      object-fit: cover; /* Para que la imagen cubra completamente su contenedor */
    }
    .img-fluid {
      width: 50%;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row h-100">
    <div class="col-md-6 p-0 d-flex align-items-center justify-content-center">
      <img src="img/coca.svg" class="img-fluid" alt="Imagen de fondo">
    </div>
    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <div class="text-center">
        <h2 class="mb-4">Iniciar Sesión</h2>

        <form action="validarusuario.php" method="POST" style="max-width: 300px;">
          <div class="form-group">
            <label for="exampleInputEmail1">Correo electrónico</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Ingresa tu correo electrónico" required>
            <small id="emailHelp" class="form-text text-muted">No compartiremos tu correo con nadie más.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Contraseña" required>
            <a href="register.php"><small id="registerHelp" class="form-text text-muted">Registrarse</small></a>
          </div>
           <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>

<script src="./js/validarcorreo.js"></script>
</html>
