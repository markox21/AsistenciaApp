# Control A
## Aplicacion Movil para registrar Asistencia

Creado en Android Studio con Java utilizando la biblioteca Volley para conectar con PHP.
## Funcionamiento
Iniciar sesión en la app con la cuenta que registramos en la web.
![Login](https://github.com/markox21/AsistenciaApp/blob/main/WhatsApp%20Image%202024-02-25%20at%202.00.23%20PM.jpeg)

El correo y la contraseña se valida con la base de datos, al iniciar sesión hay un input en el cual va el codigo que generamos en la pagina web para confirmar la asistencia.
![inicio](https://github.com/markox21/AsistenciaApp/blob/main/WhatsApp%20Image%202024-02-25%20at%202.00.23%20PM%20(1).jpeg)

## Pagina Web 
Registramos un nuevo trabajador, al ingresar 8 caracteres en el campo de DNI usamos la API de Reniec para traer los nombres y apellidos de la persona automaticamente.

![Registro](https://github.com/markox21/AsistenciaApp/blob/main/WhatsApp%20Image%202024-02-25%20at%201.58.14%20PM.jpeg)

Login
![Login](https://github.com/markox21/AsistenciaApp/blob/main/WhatsApp%20Image%202024-02-25%20at%201.58.00%20PM.jpeg)

Al iniciar sesión le damos click al boton de generar codigo y este se ingresa a la BD en la cual nos va a servir para confirmar la asistencia desde el movil.
![GenerarCodigo](https://github.com/markox21/AsistenciaApp/blob/main/WhatsApp%20Image%202024-02-25%20at%201.58.54%20PM.jpeg)

##Dashboard
En el dashboard podemos ver el total de trabajadores, los que asistieron y faltaron, también poder buscar un trabajador según su ID.

![Dashboard](https://github.com/markox21/AsistenciaApp/blob/main/WhatsApp%20Image%202024-02-25%20at%209.32.40%20PM.jpeg)
