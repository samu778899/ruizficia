<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave= "";
    $basededatos = "prueba";

    $enlace = mysqli_connect ($servidor, $usuario, $clave, $basededatos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUIZFICIAL</title>
    <link rel="icon" href="logo.ico">
    <link rel="stylesheet" href="style.css">
    <title>Registro de usuario</title>
</head>
<body>
    <form action="#" name="prueba" method="post">
    <h1>Registro de usuario (opcional)</h1>
    <form id="formularioRegistro">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido">

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" min="18" max="100" placeholder="Ingrese su edad">

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico">

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Ingrese su contraseña">
        <button type="submit">registrar</button>
    </form>

    <p id="resultadoRegistro"></p>

    <script>
        const formularioRegistro = document.getElementById('formularioRegistro');
        const resultadoRegistro = document.getElementById('resultadoRegistro');

        formularioRegistro.addEventListener('submit', (event) => {
            event.preventDefault(); // Evitar el envío del formulario por defecto

            const nombre = document.getElementById('nombre').value.trim();
            const apellido = document.getElementById('apellido').value.trim();
            const edad = parseInt(document.getElementById('edad').value);
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();

            // Validar nombre y apellido
            if (nombre === '' || apellido === '') {
                resultadoRegistro.innerHTML = 'Error: Nombre y apellido son obligatorios.';
                return;
            }

            // Validar edad
            if (isNaN(edad) || edad < 18 || edad > 100) {
                resultadoRegistro.innerHTML = 'Error: Edad inválida (debe ser un número entre 18 y 100).';
                return;
            }

            // Validar email
            if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {
                resultadoRegistro.innerHTML = 'Error: Formato de correo electrónico inválido.';
                return;
            }

            // Validar contraseña (ejemplo: mínimo 8 caracteres, al menos una letra minúscula, una mayúscula y un número)
            if (!/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$/.test(password)) {
                resultadoRegistro.innerHTML = 'Error: La contraseña debe tener al menos 8 caracteres, una letra minúscula, una mayúscula y un número.';
                return;
            }

            // Si todas las validaciones son correctas, enviar los datos al servidor (suponiendo que exista un servidor para procesar el registro)
            // ...

            resultadoRegistro.innerHTML = '¡Datos válidos! El usuario ha sido registrado correctamente.'; 

        });
    </script>
<body>
<form method="POST" action="formulario2.php">
        <button type="submit">enviar</button>
     </form>
</body>
<?php
   if(isset($_POST['registro'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];


    $insertardatos = "INSERT INTO cliente VALUES ('', '$nombre', '$apellido', '$edad', '$email')";
    $ejecutar = mysqli_query($enlace, $insertardatos);
   }


?>
