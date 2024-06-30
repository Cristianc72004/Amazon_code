<?php
// reset-password.php

include 'conexion.php'; // Archivo para conectar a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $numero_telefono = $_POST['numero_telefono'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // Validar que las contraseñas coincidan<
    if ($new_password != $confirm_new_password) {
        echo "Las contraseñas no coinciden.";
        exit();
    }


    // Verificar si el usuario existe por número de teléfono
    $query = "SELECT ID_usuario FROM Usuario WHERE Telefono = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $numero_telefono);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario encontrado, actualizar la contraseña
        $row = $result->fetch_assoc();
        $id_usuario = $row['ID_usuario'];

        $update_query = "UPDATE Usuario SET Contraseña = ? WHERE ID_usuario = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("si", $new_password, $id_usuario);
        if ($update_stmt->execute()) {
            header("Location: ../inicio.html");
        } else {
            echo "Error al actualizar la contraseña.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    // Cerrar las declaraciones y la conexión
    $stmt->close();
    $update_stmt->close();
    $conn->close();
} else {
    echo "Método de solicitud no válido.";
}
?>
