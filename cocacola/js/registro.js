$(document).ready(function(){
    $('#registrationForm').submit(function(e){
        e.preventDefault();
        
        // Validar que el campo documentNumber tenga exactamente 8 dígitos
        var documentNumber = $('#documentNumber').val();
        if (documentNumber.length !== 8 || isNaN(documentNumber)) {
            Swal.fire({
                title: 'Error',
                text: 'El número de DNI debe contener exactamente 8 dígitos.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return; // Detener el envío del formulario si la validación falla
        }
        
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: './registrarusuario.php',
            data: formData,
            success: function(response){
                Swal.fire({
                    title: '¡Registro exitoso!',
                    text: 'Usuario registrado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = './index.php'; // Redireccionar al usuario a index.php
                    }
                });
            },
            error: function(xhr, status, error){
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un error al registrar el usuario.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});