document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Evitar el envío del formulario por defecto
    
    // Obtener el valor del correo electrónico
    var email = document.getElementById("exampleInputEmail1").value;
    
    // Validar el correo electrónico utilizando JavaScript
    if (!isValidEmail(email)) {
        document.getElementById("alertMessage").textContent = "Correo electrónico inválido.";
        document.getElementById("alertMessage").style.display = "block";
        return; // Detener el envío del formulario
    }
    
    // Si el correo electrónico es válido, continuar con el envío del formulario mediante AJAX
    var formData = new FormData(this);
    
    fetch("validarusuario.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // Mostrar el mensaje de respuesta en la página
        document.getElementById("alertMessage").textContent = data;
        document.getElementById("alertMessage").style.display = "block";
    })
    .catch(error => console.error("Error:", error));
});

// Función para validar un correo electrónico utilizando una expresión regular
function isValidEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}