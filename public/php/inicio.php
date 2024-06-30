<?php

include 'conexion.php';

//Obtener los datos del formulario de login
$usuario = $_POST['email'];
$contrasena = $_POST['password'];

//Consultar la tabla login para verificar las credenciales
$sql = "SELECT * FROM usuario WHERE Correo_electronico = '$usuario' AND contraseña = '$contrasena'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    //Inicio de sesión exitoso
    header("Location: ../laboratorio.html");
    exit;
} else {
    //Credenciales incorrectas
    echo "Usuario o contraseña incorrectos";
}

//Cerrar la conexión
$conn->close();

?>
