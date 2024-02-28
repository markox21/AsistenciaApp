$(document).ready(function(){
  $("#documentNumber").on('input', function(){
      var dni = $(this).val();

      if (dni.length === 8) {
          $.ajax({
              type: "POST",
              url: "consultadni.php",
              data: 'dni=' + dni,
              dataType: 'json',
              success: function(data){
                  if (data.error) {
                      alert(data.error);
                  } else {
                      // Actualizar los campos de nombre y apellidos con los datos recibidos
                      $("#nombres").val(data.nombres);
                      $("#apellidos").val(data.apellidoPaterno + " " + data.apellidoMaterno);
                  }
              }
          });
      }
  });
});