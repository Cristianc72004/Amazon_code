<?php
// Conexión a la base de datos
include 'conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = ($_POST['password']);
    $telefono = $_POST['telefono'];
    $perfil = $_POST['perfil'];

    $stmt = $conn->prepare('INSERT INTO Usuario (Nombre, Apellido, Correo_electronico, Contraseña, Telefono, perfil) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->bind_param('ssssss', $firstName, $lastName, $email, $password, $telefono, $perfil);

    if ($stmt->execute()) {
        // Redirigir al usuario nuevamente al formulario de registro
        header('Location: ../index.html');
        exit; // Asegura que el script se detenga después de redireccionar
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
