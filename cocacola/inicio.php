<?php
// Verificar si la sesión está iniciada
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    // El usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header("Location: index.php");
    exit; // Finalizar la ejecución del script para evitar que se procese más código innecesario
}

// Ahora puedes continuar con el contenido de la página
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mostrar Código</title>
<link rel="stylesheet" href="css/style.css">
<style>
  body {
    background-image: url('img/fondo_inicio.jpg'); /* Ruta a tu imagen de fondo */
    background-size: cover; /* Ajusta el tamaño de la imagen para cubrir toda la pantalla */
    background-position: center; /* Centra la imagen */
  }
  .container {
    position: relative;
  }
  footer {
    position: fixed;
    bottom: 0;
    width: 98%;
    padding: 20px 0; /* Ajusta el relleno según sea necesario */
  }
</style>
</head>
<body>
  <div>
    <div class="col-md-6 p-0 d-flex align-items-center justify-content-center">
      <img src="./img/coca.svg" class="img-coca" alt="Imagen de fondo">
      <a href="index.php" class="btn-cerrar">Cerrar Sesión</a>
    </div>
  </div>
  <div class="container">
    <p id="hiddenCode" style="display: none;"></p>
    <button class="btn" id="showCodeBtn">Mostrar Código</button>
    <p id="warningMessage" style="display: none; color: red;"></p>
  </div>

<footer>
  <div class="container">
    <div class="row" id="footer-row">
      <div class="footer-item">
        <a href="https://twitter.com/CocaColaPe"><img src="img/twitter.png" alt="Coca-Cola"></a>
      </div>
      <div class="footer-item">
        <a href="https://www.facebook.com/cocacolaperu/?locale=es_LA"><img src="img/facebook.png" alt="Facebook"></a>
      </div>
      <div class="footer-item">
        <a href="https://www.instagram.com/cocacolape/?hl=es-la"><img src="img/instagram.webp" alt="Instagram"></a>
      </div>
    </div>
  </div>
</footer>

<script>
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("showCodeBtn").addEventListener("click", function() {
    // Llamar al script PHP para generar un nuevo código
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "generar_codigo.php", true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var response = xhr.responseText;
        if (response.startsWith("Error")) {
          document.getElementById("warningMessage").textContent = response;
          document.getElementById("warningMessage").style.display = "block";
        } else {
          document.getElementById("hiddenCode").textContent = "Código: " + response;
          document.getElementById("hiddenCode").style.display = "block";
        }
      }
    };
    xhr.send();
  });
});

// Temporizador para llamar al script generar_codigo.php cada 23 horas y 59 minutos
setInterval(function() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "generar_codigo.php", true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = xhr.responseText;
      if (response.startsWith("Error")) {
        console.error(response);
      }
    }
  };
  xhr.send();
}, 23 * 60 * 60 * 1000 + 59 * 60 * 1000); // 23 horas y 59 minutos en milisegundos
</script>
</body>
</html>

